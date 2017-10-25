<?php

if(isset($_GET['id'])) {
	$id = (int)trim($_GET['id']);
	if (!$id) {
		die("Некорректный GET параметр id");
	}
} else die("Не передан GET параметр id");

require __DIR__ . '/autoload.php';

use App\Models\Article;

if($article = Article::findById($id)) var_dump($article);
 else echo 'По данному id ничего не найдено';
