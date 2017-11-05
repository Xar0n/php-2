<?php
namespace App\Models;

use App\{DB,Model};

/**
 * Class Article
 * @package App\Models
 * @category Model
 * @property $author
 */
class Article extends Model
{
	/**
	 * @var string|null
	 * @static
	 * @access protected
	 */
	protected static $table = 'articles';
	/**
	 * @var string
	 * @access public
	 */
	public $title;
	/**
	 * @var string
	 * @access public
	 */
	public $lead;
	/**
	 * @var int
	 * @access public
	 */
	public $author_id;

	/**
	 * @param $name
	 * @return bool|object
	 * @access public
	 */
	public function __get($name)
	{
		if ($name == 'author') {
			if (!empty($this->author_id)) {
			  	return $this->author = Author::findById($this->author_id);
			}
		}
	}

	/**
	 * @param int $number
	 * @return array
	 * @static
	 * @access public
	 */
	public static function selectLimitDesc(int $number)
	{
		$db = new DB();
		$sql = 'SELECT * FROM ' . self::$table . ' ORDER BY `id` DESC LIMIT ' . $number;
		return $db->query($sql, [], self::class);
	}
}