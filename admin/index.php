<?php
require __DIR__ . '/../autoload.php';

use App\Models\Article;

if(isset($_POST) && isset($_POST['delete']) && isset($_POST['id_article']) && (int)$_POST['id_article']) {
	$article = Article::findById($_POST['id_article']);
	if(!is_bool($article)) $article->delete();
}

$articles = Article::findAll();
include __DIR__ . '/../App/Views/admin/index.php';
