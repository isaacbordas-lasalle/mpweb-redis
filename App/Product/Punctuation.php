<?php namespace App\Product;

use Predis\Client;

class Punctuation
{
    private $client;
    private $name;
    private $punctuation;
    private $counter;
    
    /**
	 * @param Client $client
	 * @param string $name
	 */
	public function __construct(Client $client, $name)
	{
            $this->client = $client;
            $this->name = $name;
            $this->punctuation = null;
            $this->counter = 0;
	}

	/**
	 * @return int|null
	 */
	public function get()
	{
            return (empty($this->punctuation)) ? $this->punctuation : floor($this->punctuation / $this->counter);
	}

	/**
	 * @param int $punctuation
	 */
	public function set($punctuation)
	{
            $this->counter = $this->counter + 1;
            $this->punctuation = $this->punctuation + $punctuation;
	}

}