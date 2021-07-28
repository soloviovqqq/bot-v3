<?php

namespace App\Utils\BinanceService;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Lin\Binance\Binance;
use Telegram\Bot\Api;

/**
 * Class BinanceService
 * @package App\Utils\BinanceService
 */
class BinanceService
{
    /**
     * @return void
     */
    public function sendPrice(): void
    {
        $symbol = 'ETHUSDT';
        $price = $this->getPrice($symbol);
        $this->sendMessage($symbol, $price);
    }

    /**
     * @param string $symbol
     * @return float
     */
    private function getPrice(string $symbol): float
    {
        $binance = new Binance(env('BINANCE_KEY'), env('BINANCE_SECRET'));
        return $binance->system()->getTickerPrice(['symbol' => $symbol])['price'];
    }

    /**
     * @param string $symbol
     * @param float $price
     */
    private function sendMessage(string $symbol, float $price): void
    {
        $message = "*SYMBOL* - $symbol\n" .
            "*PRICE*: $price\n" .
            "*TIME*: " . Carbon::now()->format(CarbonInterface::DEFAULT_TO_STRING_FORMAT);
        $telegram = app()->make(Api::class);
        $telegram->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'parse_mode' => 'Markdown',
            'text' => $message,
        ]);
    }
}
