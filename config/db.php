<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2-demo',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'tablePrefix'=>'mrs_',
    'emulatePrepare' => false,//false 则表示在PHP端过滤sql，true则表示在数据库端（更安全）
];
