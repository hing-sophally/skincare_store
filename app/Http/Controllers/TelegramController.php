<?php

// app/Http/Controllers/TelegramController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public function webhook(Request $request)
    {
        // 1) Verify the secret header from Telegram:
        $secret = $request->header('X-Telegram-Bot-Api-Secret-Token');
        if ($secret !== config('app.telegram_secret', env('TELEGRAM_BOT_SECRET'))) {
            return response()->json(['ok' => false], 403);
        }

        $update = $request->all();

        // message or callback
        $chatId = data_get($update, 'message.chat.id')
            ?? data_get($update, 'callback_query.message.chat.id');

        $text   = trim(data_get($update, 'message.text', ''));

        if (!$chatId) {
            return response()->json(['ok' => true]); // nothing to do
        }

        // Basic command handling
        if (str_starts_with($text, '/start')) {
            $this->sendMessage($chatId, "Welcome! 🎉 Send /help to see commands.");
        } elseif (str_starts_with($text, '/help')) {
            $this->sendMessage($chatId,
                "Commands:\n/start - welcome\n/help - this help\n/ping - check bot");
        } elseif (str_starts_with($text, '/ping')) {
            $this->sendMessage($chatId, "Pong ✅");
        } else {
            // Echo user text
            $this->sendMessage($chatId, "You said:\n<code>{$this->esc($text)}</code>", 'HTML');
        }

        return response()->json(['ok' => true]);
    }

    private function sendMessage($chatId, $text, $parseMode = null, $replyMarkup = null)
    {
        $url = "https://api.telegram.org/bot".env('TELEGRAM_BOT_TOKEN')."/sendMessage";

        $payload = [
            'chat_id' => $chatId,
            'text' => $text,
        ];
        if ($parseMode)   $payload['parse_mode'] = $parseMode;
        if ($replyMarkup) $payload['reply_markup'] = $replyMarkup;

        Http::timeout(8)->post($url, $payload)->throw_if(
            fn($r) => !$r->json('ok')
        );
    }

    private function esc($s) {
        return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}
