<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'api/documentation'],

    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://matheasyapi.test'], // tu dominio
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => ['Authorization'], // necesario para Bearer token
    'max_age' => 0,
    'supports_credentials' => true,

];