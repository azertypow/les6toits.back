<?php

return [
    'debug' => true,
    'panel' => [
        'css' => './site/custom/admin/panel.css'
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
