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

use Cowlby\Loggly\Input\InputInterface;
use Cowlby\Loggly\Input\HttpInputInterface;

/**
 * Base Client class which houses some of the generic client setup.
 *
 * @author Jose Prado <cowlby@me.com>
 */
abstract class AbstractClient implements ClientInterface
{
    protected $input;

    /**
     * Constructor.
     *
     * @param HttpInputInterface $input
     */
    public function __construct(HttpInputInterface $input)
    {
        $this->setInput($input);
    }

    /**
     * Gets the Input in use.
     *
     * @return HttpInputInterface
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Sets the input to interact with.
     *
     * @param HttpInputInterface $input
     * @return AbstractClient
     */
    public function setInput(HttpInputInterface $input)
    {
        $this->input = $input;
        return $this;
    }

    /**
     * Gets the Content-Type appropriate for the Input format.
     *
     * @throws \LogicException
     * @return string
     */
    public function getContentType()
    {
        switch ($this->input->getFormat()) {

            case InputInterface::FORMAT_JSON:
                return ClientInterface::CONTENT_TYPE_JSON;
                break;

            case InputInterface::FORMAT_TEXT:
                return ClientInterface::CONTENT_TYPE_TEXT;
                break;

            default:
                throw new \LogicException('Allowed invalid input format to be set.');
        }
    }
}
