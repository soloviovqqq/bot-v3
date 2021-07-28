<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use React\EventLoop\Factory;
use Spatie\ShortSchedule\ShortSchedule;

/**
 * Class ShortScheduleRunCommand
 * @package App\Console\Commands
 */
class ShortScheduleRunCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'short-schedule:run {--lifetime= : The lifetime in seconds of worker}';

    /**
     * @var string
     */
    protected $description = 'Run the short scheduled commands';

    /**
     * @return void
     */
    public function handle(): void
    {
        $loop = Factory::create();

        (new ShortSchedule($loop))->registerCommands()->run($this->option('lifetime'));
    }
}
