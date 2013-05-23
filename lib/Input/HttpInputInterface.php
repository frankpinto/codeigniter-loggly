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
 * Represents an HTTP Loggly Input by adding a key reference.
 *
 * @author Jose Prado <cowlby@me.com>
 */
interface HttpInputInterface extends InputInterface
{
    /**
     * Gets the Input's key.
     *
     * @return string
     */
    public function getKey();

    /**
     * Sets the Input's key.
     *
     * @param string $key
     * @return HttpInputInterface
     */
    public function setKey($key);
}
