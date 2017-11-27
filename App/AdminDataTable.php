<?php

namespace App;

class AdminDataTable
{
	protected $rows;
	protected $columns;

	public function __construct(array $rows, array $columns)
	{
		$this->rows = $rows;
		$this->columns = $columns;
	}

	public function render()
	{
		$view = new View();
		$view->rows = $this->rows;
		$view->columns = $this->columns;
		$view->display(__DIR__ . '/Views/admin/default/table.php');
	}
}