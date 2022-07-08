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
        ]
    ],
];
