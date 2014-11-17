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
		copy($path, __DIR__.'/../../data/app.db');
	}
}