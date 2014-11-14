<?php

namespace Powermash\ComicVine;

use Buzz\Browser;
use Buzz\Exception\RequestException;

/**
* 
*/
class Client
{
	protected $apiKey;
	protected $browser;

	public function __construct($key)
	{
		$this->apiKey = $key;

		$this->browser = new Browser();
	}

	public function randomCharacter()
	{
		$url = 'http://www.comicvine.com/api/characters?'.http_build_query([
				'offset' 		=> mt_rand(0, 87150),
				'limit' 		=> 1,
				'format' 		=> 'json',
				'field_list'	=> 'name,image,publisher,description',
				'api_key' 		=> $this->apiKey,
			]);

		$response = $this->browser->get($url);
		$characters = json_decode($response->getContent(), true);

		$character = reset($characters['results']);

		return [
			'name' => $character['name'],
			'description' => $character['description'],
			'thumbnail' => $character['image']['super_url']
		];
	}
}