<?php

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/components/Helper.php';
require __DIR__ . '/components/Message.php';

$API_KEY = '234795588:AAFn5KSZrFsbI5zV2yVRrv3BBfra9-E-C80';
$BOT_NAME = 'EventsReminderBot';

Helper::work($API_KEY, $BOT_NAME);