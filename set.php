<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = '234795588:AAFn5KSZrFsbI5zV2yVRrv3BBfra9-E-C80';
$BOT_NAME = 'EventsReminderBot';
$hook_url = 'https://test.hostapi.ru/hook.php';
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    // Set webhook
    $result = $telegram->setWebHook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e;
}