<?php

namespace AhmedGomaaEid\Message\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function fetchChatId(Request $request)
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');

        $lastChatId = null;

        $apiUrl = 'https://api.telegram.org/bot' . $botToken . '/getUpdates';

        $response = file_get_contents($apiUrl);
        $updates = json_decode($response, true);

        if (isset($updates['result']) && is_array($updates['result'])) {
            foreach ($updates['result'] as $update) {
                if (isset($update['message']['chat']['id'])) {
                    $lastChatId = $update['message']['chat']['id'];
                }
                elseif (isset($update['channel_post']['chat']['id'])) {
                    $lastChatId = $update['channel_post']['chat']['id'];
                }
            }
        }

        // save lastChatId to .env as TELEGRAM_CHAT_ID and create if not exists
        if ($lastChatId) {
            $envPath = base_path('.env');
            if (file_exists($envPath)) {
                $envContent = file_get_contents($envPath);
                if (strpos($envContent, 'TELEGRAM_CHAT_ID=') !== false) {
                    // Update existing TELEGRAM_CHAT_ID
                    $envContent = preg_replace('/TELEGRAM_CHAT_ID=.*/', 'TELEGRAM_CHAT_ID=' . $lastChatId, $envContent);
                } else {
                    // Add new TELEGRAM_CHAT_ID
                    $envContent .= "\nTELEGRAM_CHAT_ID=" . $lastChatId;
                }
                file_put_contents($envPath, $envContent);
                // Reload environment variables
                putenv('TELEGRAM_CHAT_ID=' . $lastChatId);
                $_ENV['TELEGRAM_CHAT_ID'] = $lastChatId;
                $_SERVER['TELEGRAM_CHAT_ID'] = $lastChatId;
                // if using config cache, clear it
                if (function_exists('config')) {
                    \Illuminate\Support\Facades\Artisan::call('config:clear');
                }

            }
        }

        return view('message::telegram_chat_id_taker', compact( 'lastChatId'));
    }
}
