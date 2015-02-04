<?php
// enable the debug mode
$app['debug'] = true;
$app['twig.path'] = array(__DIR__.'/../templates');

$app['db.options'] = [
    'driver'   => 'pdo_sqlite',
    'path'     => __DIR__.'/../data/app_test.db'
];
