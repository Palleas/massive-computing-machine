<?php

namespace Powermash\ComicVine;

use Mantle\Mantle;

/**
* 
*/
class Collection implements \Iterator, \Countable
{
	protected $client;
	protected $resource;
	protected $parameters;
	protected $model;

	protected $results;
	protected $offset;
	protected $total;
	protected $limit;
	protected $position;

	public function __construct(Client $client, $resource, array $parameters = [], $model = null)
	{
		$this->client = $client;
		$this->resource = $resource;
		$this->parameters = $parameters;
		$this->model = $model;

        $this->rewind();
	}

	public function count()
    {
        if ($this->position === -1) {
            $this->next();
        }

        return $this->total;
    }

	public function current()
	{
		$current = $this->results[$this->position];
		return $this->model ? Mantle::transform($current, $this->model) : $current;
	}

	public function key()
	{
		if ($this->position === -1) {
            $this->next();
        }
        return $this->offset + $this->position;	
    }

	public function next()
	{
		$this->position++;

		if ($this->position < $this->limit) {
            return;
        }

       	$this->offset += $this->limit;
        $this->parameters['offset'] = $this->offset;
        $this->parameters['limit'] = $this->limit === 0 ? 100 : $this->limit;

        $indexResponse = $this->client->sendRequest($this->resource, $this->parameters);

        $this->limit = $indexResponse->limit;
        $this->total = $indexResponse->number_of_total_results;
        $this->results = $indexResponse->results;
        $this->position = 0;
	}

	public function rewind()
	{
		$this->results = null;
        $this->offset = 0;
        $this->total = 0;
        $this->limit = 0;
        $this->position = -1;
    }

	public function valid()
	{
		if ($this->position === -1) {
            $this->next();
        }
        
        return $this->offset + $this->position < $this->total;
	}
}