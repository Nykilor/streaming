<?php
return [
    "api_keys" => [
        "youtube" => "xxx",
        "twitch" => "xxx"
    ],
    "db" => [
        "driver" => "pdo_mysql",
        "user" => "root",
        "password" => "",
        "dbname" => "streaming"
    ],
    "entityDir" => [
        "app/Domain/Entity/Twitch",
        "app/Domain/Entity/Youtube",
        "app/Domain/Entity/Smashcast"
    ]
];
