<?php

$db     = require(__DIR__ . '/../../config/db.php');
$params = require(__DIR__ . '/params.php');



$config = [
    'id' => 'basic',
    'name' => 'TimeTracker',
    // Need to get one level up:
    'basePath' => dirname(__DIR__).'/..',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'enableCookieValidation' => false,
            // Enable JSON Input:
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    // Create API log in the standard log dir
                    // But in file 'api.log':
                    'logFile' => '@app/runtime/logs/api.log',
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',

        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/user'],
                    'extraPatterns' => [
                        'POST new' => 'new',
                        'GET get' => 'get',
                    ],
                    'pluralize' => false,
                ],
            ],
        ],
        'db' => $db,
        'response' => [
            'class' => 'yii\web\Response',
            /*
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                $response->data = [
                    'success' => $response->isSuccessful,
                    'data' => $response->data,
                ];
                $response->statusCode = 200;

            },

            'format' => yii\web\Response::FORMAT_JSON, */
            'charset' => 'UTF-8',
        ],

    ],
    'modules' => [
        'v1' => [
            'class' => 'app\api\modules\v1\Module',
        ],
    ],
    'params' => $params,
];
if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}
return $config;