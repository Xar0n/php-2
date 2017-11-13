<?php

namespace App;

use App\Exceptions\Db\{
	DbException,
	DbPrepareException
};

class DB
{
    protected $dbh;

    public function __construct()
    {
        try {
			$config = Config::getInstance();
			$this->dbh = new \PDO(
				'mysql:host=' . $config->data['db']['host'] .
				';dbname=' . $config->data['db']['database'],
				$config->data['db']['user'],
				$config->data['db']['password']
			);
			$this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch (\PDOException $e) {
        	throw new DbException;
		}
    }

    public function getDbh()
    {
        return $this->dbh;
    }

    public function query(
        string $sql,
        array $params = [],
        $class = \stdClass::class
    ) {
    	try {
			$sth = $this->dbh->prepare($sql);
			$sth->execute($params);
			return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
		} catch (\PDOException $e) {
    		throw new DbPrepareException;
		}
    }

    public function execute(
        string $sql,
        array $params = []
    ):bool {
    	try {
			$sth = $this->dbh->prepare($sql);
			return $sth->execute($params);
		} catch (\PDOException $e) {
    		throw new DbPrepareException;
		}
    }
}
