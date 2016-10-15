<?php

use Longman\TelegramBot\Request;


class Message
{
    private $item;

    public function __construct()
    {
        $input = Request::getInput();
        $this->item = json_decode($input, true);
    }

    public function getMessage()
    {
        return $this->item['message']['text'];
    }

    public function getChatId()
    {
        return $this->item['message']['chat']['id'];
    }
}