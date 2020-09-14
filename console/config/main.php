<?php

$config = [
    'id' => 'app-console',
    'basePath' => XII_ROOT.'/console',
    'components' => [
    ],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => null,
            'migrationNamespaces' => [
                'console\migrations',
            ],
        ],
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
    ],
];

return $config;
