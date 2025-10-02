<?php

use Illuminate\Support\Facades\Route;

Route::get('/telegram-chat-id-taker', [\AhmedGomaaEid\Message\Http\Controllers\TelegramController::class, 'fetchChatId']);
