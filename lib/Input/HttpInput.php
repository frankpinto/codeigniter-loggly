<?php

/*
 * This file is part of the PHP Loggly Bindings package.
 *
 * (c) Jose Prado <cowlby@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cowlby\Loggly\Input;

/**
 * HTTP Input implementation.
 *
 * @author Jose Prado <cowlby@me.com>
 */
class HttpInput implements HttpInputInterface
{
    protected $key;

    protected $format;

    /**
     * Constructor.
     *
     * @param string $key
     * @param string $format Defaults to FORMAT_JSON.
     */
    public function __construct($key, $format = InputInterface::FORMAT_JSON)
    {
        $this->setKey($key);
        $this->setFormat($format);
    }

    /**
     * {@inheritdoc}
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * {@inheritdoc}
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setFormat($format)
    {
        if (!in_array($format, array(InputInterface::FORMAT_JSON, InputInterface::FORMAT_TEXT))) {
            throw new \InvalidArgumentException('Invalid input format.');
        }

        $this->format = $format;

        return $this;
    }
}
