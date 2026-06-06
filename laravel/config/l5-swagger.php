<?php

return [
    'default' => 'default',
    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'MentorMe API',
                'description' => 'API для платформы менторства',
                'version' => '1.0.0',
                'termsOfService' => null,
                'contact' => [],
                'license' => [],
            ],
            'routes' => [
                'api' => 'api/documentation',
                'docs' => 'docs',
                'oauth2_callback' => 'api/oauth2-callback',
            ],
            'paths' => [
                'use_absolute_path' => false,
                'annotations' => [
                    base_path('app/OpenApi'),
                    base_path('app/Http/Controllers/Api'),
                ],
                'docs' => storage_path('api-docs'),
                'views' => base_path('resources/views/vendor/l5-swagger'),
            ],
            'constants' => [
                'L5_SWAGGER_CONST_HOST' => 'http://127.0.0.1:8000',
            ],
            'swagger_version' => '3.0',
            'proxy' => false,
            'routes_group' => [
                'middleware' => ['web'],
                'domain' => null,
            ],
            'generate_always' => env('L5_SWAGGER_GENERATE_ALWAYS', true),
            'generate_yaml_copy' => env('L5_SWAGGER_GENERATE_YAML_COPY', false),
            'generate_yaml_file' => env('L5_SWAGGER_GENERATE_YAML_FILE', null),
            'logo' => null,
            'additional_config_url' => null,
            'additional_js_url' => null,
            'operations_sort' => null,
            'validator_url' => null,
            'ui' => [
                'display' => [
                    'doc_expansion' => 'none',
                    'filter' => true,
                    'try_it_out' => true,
                    'syntax_highlight' => [
                        'theme' => 'agate',
                        'activated' => true,
                    ],
                ],
            ],
        ],
    ],
    'security' => [
        'default' => [
            'bearerAuth' => [
                'type' => 'http',
                'scheme' => 'bearer',
                'bearerFormat' => 'JWT',
            ],
        ],
    ],
    'security_schemes' => [
        'bearerAuth' => [
            'type' => 'http',
            'scheme' => 'bearer',
            'bearerFormat' => 'JWT',
        ],
    ],
];