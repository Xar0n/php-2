<?php

namespace App;

class View
	implements \Countable
{
	use Magic;

	protected $data = [];

	public function render($template)
	{
		ob_start();
		foreach ($this->data as $key => $value) {
			$$key = $value;
		}
		include $template;
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}

	public function display($template)
	{
		echo $this->render($template);
	}

	public function count()
	{
		return count($this->data);
	}

	public function __isset($name)
	{
		return isset($this->$name);
	}
}