<?php

namespace App\Models;

use App\Model;

/**
 * Class Author
 * @package App\Models
 * @category Model
 */
class Author extends Model
{
	/**
	 * @var string|null
	 */
	protected static $table = 'authors';
	/**
	 * @var string|null
	 */
	public $name;
}