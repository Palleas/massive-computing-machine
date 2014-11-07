<?php

namespace Powermash;

use Silex\Application;
use Silex\ServiceProviderInterface;

use Powermash\Marvel\Client;

/**
* 
*/
class MarvelServiceProvider implements ServiceProviderInterface
{

	public function register(Application $app)
	{
		$app['marvel.facemash'] = $app->share(function () use ($app) {
			return new Client($app['marvel.api_key'], $app['marvel.api_secret']);
		});
	}

	public function boot(Application $app)
	{

	}
}