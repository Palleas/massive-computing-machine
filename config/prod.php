<?php

// configure your app for the production environment

$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app['marvel.api_key'] = 'ad4226afe4d476d598b8ebfb4086d5fc';
$app['marvel.api_secret'] = '35a89025a3f9182626089bcdbd51e82b4305eeac';