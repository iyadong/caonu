<?php

return [
    'default_connection' => 'default',

    'connections' => [
        'default' => [
            'host' => env('MQTT_HOST', '127.0.0.1'),
            'port' => env('MQTT_PORT', 1883),
            'client_id' => env('MQTT_CLIENT_ID', 'laravelClient'),
            'username' => env('MQTT_USERNAME'),
            'password' => env('MQTT_PASSWORD'),
        ],
    ],
];
