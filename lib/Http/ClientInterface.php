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

/**
 * Defines a simple HTTP client interface that allows POSTing of messages.
 *
 * @author Jose Prado <cowlby@me.com>
 */
interface ClientInterface
{
    const USER_AGENT  = 'PHP Loggly Bindings/0.x (+https://github.com/cowlby/php-loggly-bindings)';

    const LOGGLY_HOST = 'logs.loggly.com';
    const LOGGLY_PORT = 443;

    const CONTENT_TYPE_JSON = 'application/json';
    const CONTENT_TYPE_TEXT = 'text/plain';

    /**
     * POST a message to Loggly.
     *
     * @param string $message
     * @return bool Whether the message was sent successfully.
     */
    public function post($message);
}
