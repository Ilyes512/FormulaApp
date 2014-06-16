<?php

return array(
    'default' => 'pgsql',
    'connections' => array(
        'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'formula',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ),
        'pgsql' => array(
            'driver'   => 'pgsql',
            'host'     => 'localhost',
            'database' => 'formula',
            'port'     => '5432',
            'username' => 'root',
            'password' => 'root',
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ),
    ),
);