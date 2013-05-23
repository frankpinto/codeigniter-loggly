<?php

/*
 * This file is part of the PHP Loggly Bindings package.
 *
 * (c) Jose Prado <cowlby@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cowlby\Loggly;

/**
 * Defines the general interface of sending logs to Loggly.
 *
 * @author Jose Prado <cowlby@me.com>
 */
interface LogglyInterface extends HasInputInterface
{
    /**
     * Sends a message to Loggly for logging.
     *
     * @param string $message The message to log.
     * @return LogglyInterface
     */
    public function send($message);
}
