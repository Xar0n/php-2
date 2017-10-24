<?php

namespace App;

abstract class Model
{
	protected static $table = null;

	public static function findAll()
	{
		$db = new DB();
		$sql = 'SELECT * FROM '.static::$table;
		return $db->query($sql, [], static::class);
	}

	public static function findById()
	{

	}
}