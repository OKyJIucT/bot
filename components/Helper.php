<?php

use Longman\TelegramBot\Request;
use Longman\TelegramBot\Entities\ReplyKeyboardMarkup;

class Helper
{
    public static function work($api_key, $bot_name)
    {
        new Longman\TelegramBot\Telegram($api_key, $bot_name);

        $input = new Message;

        $chat_id = $input->getChatId();
        $text = $input->getMessage();

        $data = [];
        $data['chat_id'] = $chat_id;
        $data['text'] = 'сам ты ' . $text;

        $keyboard[] = ['7', '8', '9', '+'];
        $keyboard[] = ['4', '5', '6', '-'];
        $keyboard[] = ['1', '2', '3', '*'];
        $keyboard[] = [' ', '0', ' ', '/'];

        $keyboards[] = $keyboard;

        $data['reply_markup'] = new ReplyKeyboardMarkup(
            [
                'keyboard' => $keyboards[0],
                'resize_keyboard' => true,
                'one_time_keyboard' => false,
                'selective' => false
            ]
        );

        return Request::sendMessage($data);
    }
}