<?php

return [
    'debug' => true,
    'panel' => [
        'css' => 'assets/css/custom-panel.css'
    ],
    'routes' => [
        [
            'pattern' => '/',
            'action' => function () {
                header("Location: /panel");
                die();
            }
        ],
        [
            'pattern' => '/contact',
            'method' => 'GET|POST',
            'action' => function () {
                header("Access-Control-Allow-Origin: *");
                return Page::factory([
                    'template'  => 'contact',
                    'slug'      => 'contact',
                ]);
            }
        ],
    ],
];
