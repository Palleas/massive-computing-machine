<?php

namespace Powermash\Marvel;

use Buzz\Browser;
use Buzz\Exception\RequestException;

/**
* 
*/
class Client
{
	protected $apiKey;
	protected $apiSecret;
	protected $browser;

	public function __construct($key, $secret)
	{
		$this->apiKey = $key;
		$this->apiSecret = $secret;

		$this->browser = new Browser();
	}

	public function randomCharacter()
	{
		$ts = time();

		$url = 'http://gateway.marvel.com:80/v1/public/characters?'.http_build_query([
				'offset' 	=> mt_rand(0, 1400),
				'limit' 	=> 1,
				'ts' 		=> $ts,
				'apikey' 	=> $this->apiKey,
				'hash'		=> md5($ts.$this->apiSecret.$this->apiKey)
			]);

		$response = $this->browser->get($url);
		$characters = json_decode($response->getContent(), true);

		return reset($characters['data']['results']);
	}
}