<?php

namespace App;

class DB
{
	protected $dbh;

	public function __construct()
	{
		$this->dbh = new \PDO('mysql:host=localhost;dbname=php2', 'root', '');
	}

	public function query(string $sql, array $params = [], $class = \stdClass::class)
	{
		$sth = $this->dbh->prepare($sql);
		$sth->execute($params);
		return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
	}

	/*
	 * @params - массив вида: таблица-значение
	 */
	public function insert(string $table, array $params = [])
	{
		$columns = array();
		$values = array();
		foreach ($params as $key => $value) {
			$columns[] = "`$key`";

			if ($value === null) {
				$values[] = 'NULL';
			} else {
				$value = $this->dbh->quote($value);
				$values[] = "$value";
			}
		}
		$columns_s = implode(',', $columns);
		$values_s = implode(',', $values);
		$query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
		$sth = $this->dbh->prepare($query);
		return $sth->execute();
	}
}