<?php

namespace App;


use App\Exceptions\Http\{
	Http400Exception,
	Http403Exception
};

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
			throw new Http403Exception;
		}

	}

	public function access()
	{
		return false;
	}

	public function actionErrorDb(string $template = __DIR__ .  '/Views/error_db.php')
	{
		$this->view->display($template);
	}

	public function validateInputGet(string $param, int $filter)
	{
		if (filter_has_var(INPUT_GET, $param)) {
			$value = filter_input(INPUT_GET, $param, $filter);
			if (empty($value)) {
				throw new \InvalidArgumentException;
			}
			return $value;
		} else {
			throw new Http400Exception;
		}
	}
}