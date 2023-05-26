<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Alchemy',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Alchemy',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            // 'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
         'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // 'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.osmanova.xn--80ahdri7a.site',
                'username' => 'admin@osmanova.xn--80ahdri7a.site',
                'password' => '-AI:g{S_-b0]Zm7r',
                'port'=> 25,
                'encryption'=> null,
               //  'port' => 25,
              //   'encryption' => null,
             ],
        ],

        // 'mailer' => [
        //     'class' => 'yii\swiftmailer\Mailer',
        //     'useFileTransport' => false, // Используйте true для сохранения писем в директории runtime/mail вместо отправки почты
        // ],

        // 'mailer' => [
        //     'class' => 'yii\swiftmailer\Mailer',
        //     'useFileTransport' => false,
        //     'transport' => [
        //             'class' => 'Swift_SmtpTransport',
        //             'host'=>'mail.osmanova.xn--80ahdri7a.site',
        //             'username'=>'css.alchemy@gmail.com',
        //             'password'=>'96W-sdj-b4x-KL4',
        //             'port'=>'587',
        //             'encryption'=>'tls',
        //         ],
        // ],
        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // 'game/<id_level:\d+>' => 'level/game',
                // 'level/game' => 'level/game/<id_level:\d+>',
                'game/<id_level:\d+>' => 'level/game',
                'profile' => 'user/profile',
                'admin' => 'admin/index',
                'directory' => 'site/directory',
                'register' => 'user/create',
                'user' => 'user/index',
                'login' => 'site/login',
                'contact' => 'site/contact',
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
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '*'],
    ];
}

return $config;
