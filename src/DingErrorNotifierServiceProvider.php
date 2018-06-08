<?php

namespace LDL\DingErrorNotifier;

use Illuminate\Support\ServiceProvider;
use Log;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\WebProcessor;

class DingErrorNotifierServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $monolog = Log::getMonolog();

        $handler = new DingRobotHandler();
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
