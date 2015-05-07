<?php

class DATABASE_CONFIG {

    public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'root',
        'password' => '123456',
        'database' => 'ordemservico',
        'prefix' => '',
        'encoding' => 'utf8'
    );
    public $test = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'user',
        'password' => '',
        'database' => 'database_name',
        'prefix' => '',
        'encoding' => 'utf8'
    );

}
