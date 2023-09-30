<?php
return [
    'name' => 'RS100_bot',
    'channel' => env('SLACK_CHANNEL_' . config('app.env')),
    'url' => env('SLACK_WEBHOOK_' . config('app.env')),
];
