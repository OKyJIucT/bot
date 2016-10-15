<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = '234795588:AAFn5KSZrFsbI5zV2yVRrv3BBfra9-E-C80';
$BOT_NAME = 'EventsReminderBot';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);
    // Unset webhook
    $result = $telegram->unsetWebHook();
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e;
}