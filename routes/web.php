<?php

use Illuminate\Support\Facades\Route;

Route::get('/telegram-chat-id-taker', [\AhmedEid\Message\Http\Controllers\TelegramController::class, 'fetchChatId']);
