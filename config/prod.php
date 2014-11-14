<?php

// configure your app for the production environment

$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app['comicvine.api_key'] = '291bd197c96f8f42ba79bd157198a4bbbcb204f1';