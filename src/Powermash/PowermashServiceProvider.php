<?php

namespace Powermash;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
*
*/
class PowermashServiceProvider implements ServiceProviderInterface
{
	public function register(Application $app)
	{
		$app['powermash.random_character'] = $app->protect(function () use ($app) {
			$result =  $app['db']->fetchAssoc('SELECT id, name, image from `characters` WHERE image IS NOT NULL ORDER BY RANDOM() LIMIT 1');

			return $result;
		});

		$app['powermash.add_character'] = $app->protect(function($id, $name, $image) use($app) {
			$app['db']->insert('characters', [
				'id'    => $id,
				'image' => $image,
				'name'  => $name,
			]);
		});
	}

	public function boot(Application $app)
	{

	}
}
