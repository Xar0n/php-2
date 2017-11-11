<?php
namespace App\Models;

use App\{DB,Model};

/**
 * Class Article
 *
 * @package  App\Models
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
        if ('author' == $name) {
            return Author::findById($this->author_id);
        }
        return null;
    }

	/**
	 * @param $name
	 * @return bool
	 * @access public
	 */
    public function __isset($name)
	{
		if ('author' == $name) {
			return !empty($this->author_id);
		}
		return false;
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

    public function add(
    	string $title,
		string $author_name,
		string $lead
	):bool {
		$author = new Author();
		$author->name = $author_name;
		$author->save();

		$this->title = $title;
		$this->lead = $lead;
		$this->author_id = $author->id;
		return $this->save();
	}

	public function edit(
		int $author_id,
		string $title,
		string $author_name,
		string $lead
	):bool {
		$author = Author::findById($author_id);
		$author->name = $author_name;
		$author->save();

		$this->title = $title;
		$this->lead = $lead;
		return $this->save();
	}
}
