<?php

return [
    'debug' => true,
    'panel' => [
        'css' => '/home/clients/d98898ecb865f1c357dfc40169febc89/sites/api.les6toits.ch/kirby/config/panel.css'
    ],
    'routes' => [
        [
            'pattern' => '/',
            'action' => function () {
                header("Location: /panel");
                die();
            }
        ]
    ],
];
