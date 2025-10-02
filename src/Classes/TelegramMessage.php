<?php

namespace AhmedGomaaEid\Message\Classes;

class TelegramMessage
{
    private $text = '';

    public function addText($text)
    {
        $this->text .= $text;
        return $this;
    }
    public function addLine($line)
    {
        $this->text .= "\n" . $line;
        return $this;
    }

    public function addBoldText($line)
    {
        $this->text .= "<b>" . $line . "</b>";
        return $this;
    }

    public function addList(array $items)
    {
        foreach ($items as $item) {
            $this->text .= "\n- " . $item;
        }
        return $this;
    }

    public function send()
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        if (!$botToken || !$chatId) {
            throw new \Exception('Telegram bot token or chat ID is not set in the environment variables.');
        }

        $apiUrl = 'https://api.telegram.org/bot' . $botToken . '/sendMessage';

        $postData = [
            'chat_id' => $chatId,
            'text' => $this->text,
            'parse_mode' => 'HTML'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if (!$responseData || !isset($responseData['ok']) || !$responseData['ok']) {
            throw new \Exception('Failed to send message via Telegram API.');
        }

        return $responseData;
    }
}
