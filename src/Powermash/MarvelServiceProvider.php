<?php

namespace Facemash;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
* 
*/
class MarvelServiceProvider extends AnotherClass
{
	protected $key;
	protected $secret;

	public function __construct($key, $secret)
	{
		$this->key = $key;
		$this->secret = $secret;
	}

	public function register(Application $app)
	{
		$app['marvel.facemash'] = $app->share(function () {

		});
	}

	public function boot(Application $app)
	{

	}
}