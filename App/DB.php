<?php

namespace App;

class DB
{
	protected $dbh;

	public function __construct()
	{
		$config = Config::getInstance();
		$this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] .
			';dbname=' . $config->data['db']['database'],
			$config->data['db']['user'],
			$config->data['db']['password']);
	}

	public function getDbh()
	{
		return $this->dbh;
	}

	public function query(string $sql, array $params = [], $class = \stdClass::class)
	{
		$sth = $this->dbh->prepare($sql);
		$sth->execute($params);
		return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
	}

	public function execute(string $sql, array $params = [])
	{
		$sth = $this->dbh->prepare($sql);
		return $sth->execute($params);
	}
}