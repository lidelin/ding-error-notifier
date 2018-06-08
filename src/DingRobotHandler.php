<?php

namespace LDL\DingErrorNotifier;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Handler\StreamHandler;

class DingRobotHandler extends AbstractProcessingHandler
{
    protected function write(array $record)
    {
        $dingChannel = config('ding.error-notifier');
        if ($dingChannel) {
            ding()->with('error-notifier')->text(json_encode($record));
        }
    }
}
