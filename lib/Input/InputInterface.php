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
 * Represents a Loggly input which can be either a JSON or a text input.
 *
 * @author Jose Prado <cowlby@me.com>
 */
interface InputInterface
{
    const FORMAT_JSON = 'json';
    const FORMAT_TEXT = 'text';

    /**
     * Gets the Input's format.
     *
     * @return string
     */
    public function getFormat();

    /**
     * Sets the Input's format.
     *
     * @param string $format
     * @throws \InvalidArgumentException
     * @return InputInterface
     */
    public function setFormat($format);
}
