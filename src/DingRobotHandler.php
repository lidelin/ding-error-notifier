<?php

namespace LDL\DingErrorNotifier;

use Monolog\Handler\StreamHandler;
use Monolog\Handler\AbstractProcessingHandler;

class DingRobotHandler extends AbstractProcessingHandler
{
    protected function write(array $record)
    {
        $channelName = config('notifier.ding_channel');
        $dingChannel = config("ding.{$channelName}");
        if ($dingChannel) {
            ding()->with($channelName)->text(json_encode($record, JSON_UNESCAPED_UNICODE));
        }
    }
}
