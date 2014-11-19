<?php

// configure your app for the production environment

$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app['debug'] = true;

$app['comicvine.api_key'] = '291bd197c96f8f42ba79bd157198a4bbbcb204f1';

$url = parse_url(getenv('CLEARDB_DATABASE_URL'));

$server = $url['host'];
$username = $url['user'];
$password = $url['pass'];
$db = substr($url['path'],1);

$app['db.options'] = [
	'driver'   => 'pdo_mysql',
    'dbname'   => $db,
    'host'     => $server,
    'user'     => $username,
    'password' => $password,
];

var_dump($app['db.options']); die;