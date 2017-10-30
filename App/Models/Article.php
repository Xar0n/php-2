<?php
namespace App\Models;

use App\DB;
use App\Model;

class Article extends Model
{
	protected static $table = 'articles';
	public $title;
	public $lead;

	public static function selectLimit($number)
	{
		$db = new DB();
		$sql = 'SELECT * FROM ' . self::$table . ' ORDER BY `id` DESC LIMIT ' . $number;
		return $db->query($sql, [], self::class);
	}
}