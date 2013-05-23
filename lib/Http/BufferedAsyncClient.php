<?php

/*
 * This file is part of the PHP Loggly Bindings package.
 *
 * (c) Jose Prado <cowlby@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cowlby\Loggly\Http;

use Cowlby\Loggly\Input\HttpInputInterface;

/**
 * @author Jose Prado <cowlby@me.com>
 */
class BufferedAsyncClient extends AbstractClient
{
    protected $hostname;

    protected $port;

    protected $buffer = array();

    public function __construct(HttpInputInterface $input)
    {
        parent::__construct($input);

        $this->hostname = 'ssl://' . ClientInterface::LOGGLY_HOST;
        $this->port = ClientInterface::LOGGLY_PORT;
        $this->buffer = array();

        // __destructor() doesn't get called on Fatal errors
        register_shutdown_function(array($this, 'postBatch'));
    }

    /**
     * Adds the message to the buffer for batch POSTing on close.
     */
    public function post($message)
    {
        $this->buffer[] = $message;
        return TRUE;
    }

    /**
     * Posts all the messages as a batch.
     *
     * @throws \RuntimeException
     * @return boolean
     */
    public function postBatch()
    {
        $fp = fsockopen($this->hostname, $this->port, $errno, $errstr, 30);

        if (FALSE === $fp) {
            throw new \RuntimeException($errstr, $errno);
        }

        for ($i = 0, $c = count($this->buffer); $i < $c; $i++) {

            $message = $this->buffer[$i];

            $request = "POST /inputs/" . $this->input->getKey() . " HTTP/1.1\r\n";
            $request .= "Host: " . ClientInterface::LOGGLY_HOST . "\r\n";
            $request .= "User-Agent: " . ClientInterface::USER_AGENT . "\r\n";
            $request .= "Content-Type: " . $this->getContentType() . "\r\n";
            $request .= "Content-Length: " . strlen($message) . "\r\n";

            // Add Connection: Close header on the last request.
            $request .= $i === $c - 1 ? "Connection: Close\r\n\r\n" : "\r\n";

            $request .= $message;
            $request .= $i === $c - 1 ? "" : "\r\n";

            fwrite($fp, $request);
        }

        fclose($fp);

        return TRUE;
    }
}
