<?php

namespace App;

class Config
{
	public $data = array();
	private static $instance = null;
	protected $config_file = 'config.php';

	private function __construct()
	{
		$this->data = include __DIR__ . '/../' . $this->config_file;
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