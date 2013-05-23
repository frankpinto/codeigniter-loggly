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

use Cowlby\Loggly\Input\InputInterface;

/**
 * Holds a Loggly input.
 *
 * @author Jose Prado <cowlby@me.com>
 */
interface HasInputInterface
{
    /**
     * Sets the Input that the object should use.
     *
     * @param InputInterface $input
     * @return LogglyInterface
     */
    public function setInput(InputInterface $input);

    /**
     * Returns the Input that the object is using.
     *
     * @return InputInterface
     */
    public function getInput();
}
