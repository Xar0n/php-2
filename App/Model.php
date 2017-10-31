<?php

namespace App;

abstract class Model
{
	public $id;
	protected static $table = null;

	public static function findAll()
	{
		$db = new DB();
		$sql = 'SELECT * FROM ' . static::$table;
		return $db->query($sql, [], static::class);
	}

	public static function findById(int $id)
	{
		$db = new DB();
		$sql = 'SELECT * FROM ' . static::$table. ' WHERE id = :id';
		$result = $db->query($sql, [':id' => $id], static::class);
		return $result ? $result[0] : false;
	}

	protected function update()
	{
		$fields = get_object_vars($this);
		$sets = [];
		$data = [];
		foreach ($fields as $name => $value) {
			$data[':' . $name] = $value;
			if ('id' == $name) {
				continue;
			}
			$sets[] = $name . '=:' . $name;
		}

		$sql = '
		UPDATE ' . static::$table . '
		SET ' . implode(', ', $sets) . '
		WHERE id=:id';
		$db = new DB();
		$db->execute($sql, $data);
	}

	protected function insert()
	{
		$fields = get_object_vars($this);
		$sets_fields = [];
		$data = [];
		foreach ($fields as $name => $value) {
			if ('id' == $name) {
				continue;
			}
			if (is_null($value)) {
				$value = 'NULL';
			}
			$data[':' . $name] = $value;
			$sets_fields[] = $name;
		}

		$sql = '
		INSERT ' . static::$table . '(id, ' . implode(', ', $sets_fields) . ') VALUES(NULL, ' . implode(', ', array_keys($data)) . ')';
		$db = new DB();
		$db->execute($sql, $data);
		$this->id = $db->getDbh()->lastInsertId();
	}

	public function save()
	{
		$fields = get_object_vars($this);
		if(is_null($fields['id'])) {
			$this->insert();
		}
		$this->update();
	}

	public  function delete()
	{
		$fields = get_object_vars($this);
		if(is_null($fields['id'])) {
			return false;
		}
		$db = new DB();
		$sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id';
		$db->execute($sql, [':id' => $fields['id']]);
	}
}