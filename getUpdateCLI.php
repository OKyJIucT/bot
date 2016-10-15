<?php

// Load composer
require __DIR__ . '/vendor/autoload.php';

use Longman\TelegramBot\Request;

// Add you bot's API key and name
$API_KEY = '234795588:AAFn5KSZrFsbI5zV2yVRrv3BBfra9-E-C80';
$BOT_NAME = 'EventsReminderBot';

// Define a path for your custom commands
//$commands_path = __DIR__ . '/Commands/';

// Enter your MySQL database credentials
$mysql_credentials = [
    'host' => 'localhost',
    'user' => 'okyjiuct',
    'password' => '5092503',
    'database' => 'bot',
];

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);




    // Enable MySQL
    $telegram->enableMySql($mysql_credentials);


    // Handle telegram getUpdates request
    $serverResponse = $telegram->handleGetUpdates();


    if ($serverResponse->isOk()) {
        //$updateCount = count($serverResponse->getResult());

        //echo date('Y-m-d H:i:s', time()) . ' - Processed ' . $updateCount . ' updates' . "\n";

        $result = $serverResponse->getResult();

        if (sizeof($result) > 0) {
            foreach ($result as $message) {

                $chat_id = $message->getMessage()->getChat()->getId();
                $data = [];
                $data['chat_id'] = $chat_id;
                $data['text'] = 'Write something:';

                return Request::sendMessage($data);
            }
        }

        //print_r($serverResponse->getResult());

//        // Create Telegram API object
//        $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);
//
//
//
//        $message = $this->getMessage();
//        $chat_id = $message->getChat()->getId();
//        $data = [];
//        $data['chat_id'] = $chat_id;
//        $data['text'] = 'Write something:';
//        $data['reply_markup'] = new ForceReply(['selective' => false]);
//        return Request::sendMessage($data);

        // Handle telegram webhook request
        // $telegram->handle();

    } else {
        echo date('Y-m-d H:i:s', time()) . ' - Failed to fetch updates' . PHP_EOL;
        echo $serverResponse->printError();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e;
    // Log telegram errors
    Longman\TelegramBot\TelegramLog::error($e);
} catch (Longman\TelegramBot\Exception\TelegramLogException $e) {
    // Catch log initilization errors
    echo $e;
}