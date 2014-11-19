<?php

use Silex\Provider\MonologServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;

// include the prod configuration
require __DIR__.'/prod.php';

// enable the debug mode
$app['debug'] = true;

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../var/logs/silex_dev.log',
));

$app->register($p = new WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/../var/cache/profiler',
));
$app->mount('/_profiler', $p);

$app['comicvine.api_key'] = '291bd197c96f8f42ba79bd157198a4bbbcb204f1';

$app['db.options'] = [
    'driver'   => 'pdo_mysql',
    'dbname'   => 'powermash',
    'host'     => 'localhost',
    'user'     => 'root',
];