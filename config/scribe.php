<?php

use Knuckles\Scribe\Extracting\Strategies;

return [
    'title' => "Prisioner API Documentation",

    'description' => 'Documentação da API para o Sistema de Gerenciamento de Prisioneiros
    Esta documentação tem como objetivo fornecer todas as informações necessárias para trabalhar com nossa API.

    Conforme você rola, verá exemplos de código para trabalhar com a API em diferentes linguagens de programação 
    na área escura à direita (ou como parte do conteúdo em dispositivos móveis).

    Você pode alternar a linguagem usada com as guias no canto superior direito (ou no menu de navegação no canto 
    superior esquerdo em dispositivos móveis).',

    'routes' => [
        [
            'match' => [
                'prefixes' => ['api/*'],
                'domains' => ['*'],
                'versions' => ['v1'],
            ],
        ],
    ],

    'type' => 'external_static',

    'theme' => 'scalar',

    'static' => [
        'output_path' => 'public/docs',
    ],

    'laravel' => [
        'add_routes' => true,

        'docs_url' => '/docs.postman',

        'assets_directory' =>null,

        'middleware' => [],
    ],

    'external' => [
        'html_attributes' => []
    ],

    'try_it_out' => [
        'enabled' => true,

        'base_url' => null,

        'use_csrf' => true,

        'csrf_url' => '/sanctum/csrf-cookie',
    ],

    'auth' => [
        'enabled' => false,

        'default' => false,

        'in' => 'bearer',

        'name' => 'key',

        'use_value' => env('SCRIBE_AUTH_KEY'),

        'placeholder' => '{YOUR_AUTH_KEY}',

        'extra_info' => 'You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.',
    ],

    'example_languages' => [
        'bash',
        'javascript',
    ],
    'postman' => [
        'enabled' => true,

        'overrides' => [
        ],
    ],

    'openapi' => [
        'enabled' => true,

        'overrides' => [
        ],
    ],

    'groups' => [
        'default' => 'Endpoints',
        'order' => [
            'Usuário' => [
                'GET    /api/users',
                'POST   /api/users',
                'PUT    /api/users/{id}',
                'DELETE /api/users/{id}',
            ],
            'Funcionários' => [
                'GET /api/employees',
                'POST /api/employees',
                'PUT /api/employees/{id}',
                'DELETE /api/employees/{id}',
            ],
            'Prisioneiros' => [
                'GET /api/prisioners',
                'POST /api/prisioners',
                'PUT /api/prisioners/{id}',
                'DELETE /api/prisioners/{id}',
            ],
            'Visitantes' => [
                'GET /api/visitors',
                'POST /api/visitors',
                'PUT /api/visitors/{id}',
                'DELETE /api/visitors/{id}',    
            ],
        ],
    ],

    'logo' => '../public/jailicon.svg',

    'last_updated' => 'última Atualização: {date:F j, Y}',

    'examples' => [
        'faker_seed' => null,
        'models_source' => ['factoryCreate', 'factoryMake', 'databaseFirst'],
    ],
    'strategies' => [
        'metadata' => [
            Strategies\Metadata\GetFromDocBlocks::class,
            Strategies\Metadata\GetFromMetadataAttributes::class,
        ],
        'urlParameters' => [
            Strategies\UrlParameters\GetFromLaravelAPI::class,
            Strategies\UrlParameters\GetFromUrlParamAttribute::class,
            Strategies\UrlParameters\GetFromUrlParamTag::class,
        ],
        'queryParameters' => [
            Strategies\QueryParameters\GetFromFormRequest::class,
            Strategies\QueryParameters\GetFromInlineValidator::class,
            Strategies\QueryParameters\GetFromQueryParamAttribute::class,
            Strategies\QueryParameters\GetFromQueryParamTag::class,
        ],
        'headers' => [
            Strategies\Headers\GetFromHeaderAttribute::class,
            Strategies\Headers\GetFromHeaderTag::class,
            [
                'override',
                [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            ]
        ],
        'bodyParameters' => [
            Strategies\BodyParameters\GetFromFormRequest::class,
            Strategies\BodyParameters\GetFromInlineValidator::class,
            Strategies\BodyParameters\GetFromBodyParamAttribute::class,
            Strategies\BodyParameters\GetFromBodyParamTag::class,
        ],
        'responses' => [
            Strategies\Responses\UseResponseAttributes::class,
            Strategies\Responses\UseTransformerTags::class,
            Strategies\Responses\UseApiResourceTags::class,
            Strategies\Responses\UseResponseTag::class,
            Strategies\Responses\UseResponseFileTag::class,
            [
                Strategies\Responses\ResponseCalls::class,
                ['only' => ['GET *']]
            ]
        ],
        'responseFields' => [
            Strategies\ResponseFields\GetFromResponseFieldAttribute::class,
            Strategies\ResponseFields\GetFromResponseFieldTag::class,
        ],
    ],

    'database_connections_to_transact' => [config('database.default')],

    'fractal' => [
        'serializer' => null,
    ],

    'routeMatcher' => \Knuckles\Scribe\Matching\RouteMatcher::class,

    'base_url' => null,
    // Text to place in the "Introduction" section, right after the `description`. Markdown and HTML are supported.
    'intro_text' => <<<INTRO
    This documentation aims to provide all the information you need to work with our API.
    
    <aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
    You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
    INTRO,
];