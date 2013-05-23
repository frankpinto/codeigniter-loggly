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

use Pimple;
use Cowlby\Loggly\Input\InputInterface;
use Cowlby\Loggly\Http\ClientInterface;

/**
 * Logs to Loggly using the public HTTP API.
 *
 * @author Jose Prado <cowlby@me.com>
 */
class ApiLogger extends Pimple implements LogglyInterface
{
    /**
     * Constructor.
     *
     * Initializes the service container with sane defaults.
     *
     * @param string $key The input key of the HTTP input to use.
     */
    public function __construct($key)
    {
        $this['input.key'] = $key;

        $this['input.format'] = InputInterface::FORMAT_JSON;

        $this['input.class'] = 'Cowlby\\Loggly\\Input\\HttpInput';

        $this['input'] = $this->share(function($container) {

            return new $container['input.class'](
                $container['input.key'],
                $container['input.format']
            );
        });

        $this['client.class'] = 'Cowlby\\Loggly\\Http\\AsyncClient';

        $this['client'] = $this->share(function($container) {

            return new $container['client.class']($container['input']);
        });
    }

    /**
     * {@inheritdoc}
     */
    public function setInput(InputInterface $input)
    {
        $this['input'] = $input;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getInput()
    {
        return $this['input'];
    }

    /**
     * {@inheritdoc}
     */
    public function send($message)
    {
        $this['client']->post($message);
        return $this;
    }
}
