<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/31/15
 * Time: 7:44 AM
 */

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
// {{{ Removing api/web from url @see http://www.yiiframework.com/wiki/755/how-to-hide-frontend-web-in-url-addresses-on-apache/*/
use \yii\web\Request;
$baseUrl = str_replace('/api/web', '/api', (new Request)->getBaseUrl());// also add ['vomponents']['request'] 'baseUrl' => $baseUrl,
//}}} ./Removing api/web from url
return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'tracking' => [
            'class' => 'api\modules\tracking\Module'   // here is our tracking modules
        ],
        'reporting' => [
            'class' => 'api\modules\reporting\Module'   // here is our reporting modules
        ],
        'rapid_assessment'=>[
           'class'=>'api\modules\rapid_assessment\Module' ,
        ],

    ],
    'components' => [

        'request' => [
            'class' => '\yii\web\Request',
            'baseUrl' => $baseUrl,
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',

            ]
        ],
        'user' => [
            'identityClass' => 'common\modules\user\models\User',
            'enableAutoLogin' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => ['site'],
                    'pluralize'=>false,
                ],
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => ['rapid_assessment/report-item'],
                    'pluralize'=>true,
                    'extraPatterns' => [
                        'GET unique/<property:\w+>' => 'unique',
                        'GET attributes' => 'attributes',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => ['rapid_assessment/item'],
                    'pluralize'=>true,
                    'extraPatterns' => [
                        'GET unique/<attribute:\w+>' => 'unique',
                        'GET info' => 'info',
                        'GET attributes' => 'attributes',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => ['tracking/unique'],
                    'pluralize'=>false,
                    'extraPatterns' => [
                        'GET <property:\w+>/<value:\w+>' => 'index',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => ['reporting/event'],
                    'extraPatterns' => [
                        'POST test-create' => 'test-create', // 'test' refers to 'actionTestCreate'
                        'POST test-update/{id}' => 'test-update', // 'test' refers to 'actionTestUpdate'
                        'POST test-manage' => 'test-manage', // 'test' refers to 'actionTestManage'
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => ['reporting/item'],
                    'extraPatterns' =>
                        [
                            'GET search' => 'search',
                        ]

                ],
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => ['reporting/report-item'],
                    'extraPatterns' =>
                        [
                            'GET describe-feature-type' => 'describe-feature-type',
                        ]

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'reporting/item-type',
                    'extraPatterns' =>
                        [
                            'GET search' => 'search',
                            'GET json'=>'json',
                        ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'reporting/item-sub-type',
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'reporting/item-child',
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'tracking/driver',
                    'extraPatterns' => [
                        'GET unique/<property:\w+>' => 'unique',
                        'POST registration' => 'registration'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'tracking/tracking-driver',
                    'extraPatterns' => [
                        'GET unique/<property:\w+>' => 'unique',
                        'GET info' => 'info',
                        'GET attributes' => 'attributes',
                    ]
                ],

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'tracking/status',
                    'extraPatterns' => [
                        'GET unique/<property:\w+>' => 'unique',
                        'GET info' => 'info',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'tracking/location',
                ],
            ],
        ]
    ],
    'params' => $params,
];
