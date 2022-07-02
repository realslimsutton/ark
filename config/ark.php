<?php

return [
    'server' => [
        'status' => env('ARK_SERVER_STATUS', 'offline'),

        'rates' => [
            'experience' => env('ARK_SERVER_EXPERIENCE_RATE', 1),
            'harvest' => env('ARK_SERVER_HARVEST_RATE', 1),
            'taming' => env('ARK_SERVER_TAMING_RATE', 1),
            'maturation' => env('ARK_SERVER_MATURATION_RATE', 1),
            'incubation' => env('ARK_SERVER_INCUBATION_RATE', '1'),
            'imprint' => env('ARK_SERVER_IMPRINT_RATE', '1x 100%')
        ]
    ]
];
