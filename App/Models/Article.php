<?php
namespace App\Models;

use App\DB;
use App\Model;

class Article extends Model
{
	protected static $table = 'articles';
	public $id;
	public $title;
	public $lead;

	public static function threeLastArticle()
	{
		$db = new DB();
		$sql = 'SELECT * FROM ' . self::$table . ' ORDER BY `id` DESC LIMIT 3';
		return $db->query($sql, [], self::class);
	}
}