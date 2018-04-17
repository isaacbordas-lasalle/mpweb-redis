<?php namespace App\Product;

use Predis\Client;

class Create
{
    private $client;
    private $name;
    private $punctuation;
    
	/**
	 * @param Client $client
	 */
	public function __construct(Client $client)
	{
            $this->client = $client;
	}

	/**
	 * @param string $name
	 */
	public function create($name)
	{
            $this->name = $name;
	}

	/**
	 * @param string $name
	 * @param int $punctuation
	 */
	public function rank($name, $punctuation)
	{
            $this->name = $name;
            $this->punctuation = $punctuation;
	}

}