<?php

namespace App\Console;

use Spatie\ShortSchedule\ShortSchedule;
use App\Console\Commands\SendPriceCommand;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;
use Spatie\ShortSchedule\Commands\ShortScheduleRunCommand;

/**
 * Class Kernel
 * @package App\Console
 */
class Kernel extends ConsoleKernel
{
    /**
     * @var array
     */
    protected $commands = [
        SendPriceCommand::class,
        ShortScheduleRunCommand::class,
    ];

    /**
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {

    }

    /**
     * @param ShortSchedule $shortSchedule
     * @return void
     */
    protected function shortSchedule(ShortSchedule $shortSchedule): void
    {
        $shortSchedule->command('binance:send_price')->everySeconds(5);
    }
}
