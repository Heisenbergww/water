<?php

$params = require(__DIR__ . '/params.php');
Yii::$classMap['Salt'] = '@app/libs/Salt.php';
Yii::$classMap['Tool'] = '@app/libs/Tool.php';
Yii::$classMap['Upload'] = '@app/libs/Upload.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin',
        ],
        'mobile' => [
            'class' => 'app\mobile\admin',
        ],
    ],
    'defaultRoute' => 'home',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5e3cc25e0c267da1ac2c3126710ef21f',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
             'useFileTransport' => false,           
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',
                'username' => '269110068@qq.com',
                'password' => 'drylqplxuedjbifd',
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'messageConfig'=>[ 
                'charset'=>'UTF-8', 
                'from'=>['269110068@qq.com'=>'mall'] 
            ], 
        ],
        'i18n' => [ 
            'translations' => [ 
                'app' => [ 
                    'class' => 'yii\i18n\PhpMessageSource', 
                    'basePath' => '@app/messages', 
                    // 'sourceLanguage' => 'en-US', 
                    'fileMap' => [
                         'app' => 'app.php', 
                         'app/error' => 'error.php', 
                    ],
                ],
            ],
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
        'db' => require(__DIR__ . '/db.php'),
       
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                // '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                // '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                // '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                // '<controller:\w+>/<action:\w+>.html'=>'<controller>/<action>',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
    $config['modules']['admin'] = [
        'class' => 'app\modules\admin',
    ];
}

return $config;
