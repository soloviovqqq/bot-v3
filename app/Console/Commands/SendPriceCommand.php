<?php

namespace App\Console\Commands;

use App\Utils\BinanceService\BinanceService;
use Illuminate\Console\Command;

/**
 * Class SendPriceCommand
 * @package App\Console\Commands
 */
class SendPriceCommand  extends Command
{
    /**
     * @var string
     */
    protected $signature = 'binance:send_price';

    /**
     * @var string
     */
    protected $description = 'Send price from binance to telegram';

    /**
     * @return void
     */
    public function handle(): void
    {
        (app()->make(BinanceService::class))->sendPrice();
    }
}
