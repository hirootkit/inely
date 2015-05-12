<?php
return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        '' => '/site/index',
        'article' => '/article/index',
        'contact' => '/site/contact',
        'about' => '/site/about',
        'sign-up' => '/user/sign-in/signup',
        'login' => '/user/sign-in/login',
        'account' => '/user/default/index',
        'profile' => '/user/default/profile',
        'logout' => '/user/sign-in/logout',
        '<_a:(confirm-email)>' => 'user/sign-in/<_a>',

        // Pages
        ['pattern' => 'page/<slug>', 'route' => 'page/view'],

        // Articles
        ['pattern' => 'article/index', 'route' => 'article/index'],
        ['pattern' => 'article/<slug>', 'route' => 'article/view'],

        // Api
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/article', 'only' => ['index', 'view', 'options']],
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/user', 'only' => ['index', 'view', 'options']]
    ]
];
