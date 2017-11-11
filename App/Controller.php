<?php

namespace App;


abstract class Controller
{

	protected $view;

	public function __construct()
	{
		$this->view = new View();
	}

	public function action(string $name)
	{
		$method = 'action' . ucfirst($name);
		if ($this->access()) {
			$this->$method();
		} else {
			http_response_code(403);
			exit();
		}

	}

	public function access()
	{
		return true;
	}

	public function validateInputGet(string $param, int $filter)
	{
		if (filter_has_var(INPUT_GET, $param)) {
			$value = filter_input(INPUT_GET, $param, $filter);
			if (empty($value)) {
				http_response_code(415);
				exit();
			}
			return $value;
		} else {
			http_response_code(400);
			exit();
		}
	}
}