<?php ?>

<aside class="shadow p-3 bg-dark">
<?php
echo \yii\bootstrap4\Nav::widget([
    'options' => [
        'class' => 'd-flex flex-column nav-pills'
    ],
   'items' => [
        [
        'label' => 'Dashboard',
        'url' => ['/site/index']
        ],
        [
           'label' => 'Employees',
           'url' => ['/employee/index']
        ],
       [
        'label' => 'Leaves',
        'url' => ['/leave/index']
        ],
        [
        'label' => 'Holiday',
        'url' => ['/holiday/index']
        ]
        ,
        [
        'label' => 'Job Setup',
        'url' => '#',
        'items' => [
            ['label'=> 'Job Title ', 'url' => ['/job-titles/index']],
            ['label'=> 'Pay Grade', 'url' =>  ['/pay-grades/index']],
            ['label'=> 'Employment Status', 'url' => ['/employment-status/index']],
            ['label'=> 'Job Categories ', 'url' => ['/job-categories/index']],
            ['label'=> 'Currencies', 'url' => ['/currencies/index']],
        ]
        ],
        [
         'label' => 'Identity Setup',
         'url' => '#',
         'items' => [
            ['label'=> 'skills ', 'url' => ['/skills/index']],
            ['label'=> 'Education', 'url' => ['/education/index']],
            ['label'=> 'Licences', 'url' => ['/licences/index']],
            ['label'=> 'Languages ', 'url' => ['/languages/index']],
            ['label'=> 'Memberships', 'url' => ['/memberships/index']],
            ['label'=> 'Nationalities', 'url' =>['/nationalities/index']],
        ]
        ],
        [
            'label' => 'Company Setup',
            'url' => '#',
            'items' => [
               ['label'=> 'Company ', 'url' => ['/company-information/index']],
               ['label'=> 'Branch', 'url' => ['/company-branch/index']],
               ['label'=> 'Department', 'url' => ['/department/index']]
           ]
           ]
         

   ]
]);

?>
</aside>

