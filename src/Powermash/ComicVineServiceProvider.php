<?php

namespace Powermash;

use Silex\Application;
use Silex\ServiceProviderInterface;

use Powermash\ComicVine\Client;

/**
* 
*/
class ComicVineServiceProvider implements ServiceProviderInterface
{

	public function register(Application $app)
	{
		$app['comicvine.facemash'] = $app->share(function () use ($app) {
			return new Client($app['comicvine.api_key']);
		});
	}

	public function boot(Application $app)
	{

	}
}