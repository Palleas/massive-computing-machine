<?php

namespace Powermash\ComicVine;

use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Exception\RequestException;

use Mantle\Mantle;

/**
* 
*/
class Client
{
	const DEFAULT_ENDPOINT = 'http://www.comicvine.com/api/characters';

	protected $apiKey;
	protected $endpoint;
	protected $browser;

	public function __construct($key, $endpoint = null)
	{
		$this->apiKey = $key;
		$this->endpoint = $endpoint ?: self::DEFAULT_ENDPOINT;
		$this->browser = new Browser(new Curl());
		$this->browser->getClient()->setTimeout(60);
	}

	public function getCharacters()
	{
		return new Collection($this, 'characters', [], 'Powermash\ComicVine\Character');
	}

	public function randomCharacter()
	{
		$payload = $this->sendRequest('characters', ['offset' => mt_rand(0, 87150), 'limit' => 1]);
		$character = reset($payload['results']);

		return [
			'name' => $character['name'],
			'description' => $character['description'],
			'thumbnail' => $character['image']['super_url']
		];
	}

	public function sendRequest($ressource, array $parameters = array())
	{
		$url = sprintf('%s?%s', $this->endpoint, http_build_query(array_merge([
			'format' => 'json',
			'api_key' => $this->apiKey
		], $parameters)));

		$response = $this->browser->get($url);
		$payload = json_decode($response->getContent(), false);

		if ($error = json_last_error()) {
			throw new JSONException($error);
		}

		return $payload;
	}
}

/**
* 
*/
class JSONException extends \RuntimeException
{
	
}