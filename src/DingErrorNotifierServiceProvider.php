<?php

namespace LDL\DingErrorNotifier;

use Illuminate\Support\ServiceProvider;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\WebProcessor;
use Monolog\Logger;

class DingErrorNotifierServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $monolog = new Logger(config('logging.default'));

        $level = config('logging.channels')[config('logging.default')]['level'] ?? 'debug';

        $logLevel = $monolog::toMonologLevel($level);

        $handler = new DingRobotHandler($logLevel);
        $handler->pushProcessor(new MemoryUsageProcessor());
        $handler->pushProcessor(new WebProcessor());

        $monolog->pushHandler($handler);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
