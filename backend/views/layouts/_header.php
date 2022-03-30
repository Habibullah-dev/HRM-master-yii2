<?php

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

?>

<?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'brandOptions' => [
            'class' => 'text-warning'
        ],
        'options' => [
            'class' => 'navbar-expand-lg navbar-dark bg-dark',
        ],
    ]);
    $rightMenuItems = [
        ['label' => 'Employees',
         'url' => ['/site/index'],
         'items' => [
            ['label'=> 'Add Employee', 'url' => ['employee/signup-employee']],
            ['label'=> 'Manage Employee', 'url' => ['employee/index']],
        ]
        
        ],
    ];
    $rightMenuItems[] = ['label' => 'Leaves', 
                        'url' => ['/site/index'],
                        'items' => [
                            ['label'=> 'Add Leave', 'url' => ['/leave/create']],
                            ['label'=> 'Manage Leave', 'url' => ['/leave/index']],
                        ]
                            ];
    $rightMenuItems[] = ['label' => 'Holiday', 
                        'url' => ['/site/index'],
                        'items' => [
                            ['label'=> 'Add Holiday', 'url' =>  ['/holiday/create']],
                            ['label'=> 'Manage Holiday', 'url' =>  ['/holiday/index']],
                        ]
                    
                    ];
    $leftMenuItems = [
        ['label' => 'Admin(users)', 
        'url' => ['/site/index'],
        'items' => [
            ['label'=> 'Signup User', 'url' => ['/site/signup']],
            ['label'=> 'All Users', 'url' => '/site/users'],
        ]],
    ];
    if (Yii::$app->user->isGuest) {
        $leftMenuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $leftMenuItems[] = ['label' =>  'Logout (' . Yii::$app->user->identity->username . ')'
                        ,'url' => ['/site/logout'] , 
                         'linkOptions' => [
                            'data-method' => 'post'
                        ] ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $rightMenuItems
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $leftMenuItems,
    ]);
    NavBar::end();
    ?>