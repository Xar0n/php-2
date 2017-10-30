<?php

namespace App;


class Config
{
	public $data;
	protected $config_file =  __DIR__ .  '/config.json';

	public function __construct()
	{
		$json_object = file_get_contents($this->config_file);
		$this->data = json_decode($json_object, true);
	}
}