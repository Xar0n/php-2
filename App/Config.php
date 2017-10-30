<?php

namespace App;


class Config
{
	public $data;
	private static $instance = null;
	protected $config_file =  __DIR__ .  '/config.json';

	private function __construct()
	{
		$json_object = file_get_contents($this->config_file);
		$this->data = json_decode($json_object, true);
	}

	private function __clone()
	{

	}

	public static function getInstance()
	{
		if(self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}