<?php

namespace Powermash;

use Composer\Script\Event;

/**
* 
*/
class Powermash
{

	public static function setupDatabase(Event $event)
	{
		$path = __DIR__.'/../../data/app.db.dist';
		if (!file_exists($path)) {
			throw new \RuntimeException(sprintf('Database file does not exist at path %s', $path));
		}
		
		copy($path, __DIR__.'/../../data/app.db');
	}
}