<?php

namespace App\Exceptions;


class Errors extends \Exception
{
	protected $data = array();

	public function add(\Throwable $e)
	{
		$this->data[] = $e;
	}

	public function getAll()
	{
		return $this->data;
	}

	public function empty(): bool
	{
		return empty($this->data);
	}
}