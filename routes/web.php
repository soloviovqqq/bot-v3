<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Telegram\Bot\Api;

$router->get('/', function () use ($router) {
    $telegram = app()->make(Api::class);
    $telegram->sendMessage([
        'chat_id' => env('TELEGRAM_CHAT_ID'),
        'text' => '$message',
    ]);

    return $router->app->version();
});
