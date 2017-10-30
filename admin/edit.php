<?php
if(isset($_GET['id'])) {
	$id = (int)trim($_GET['id']);
	if (!$id) {
		die("Некорректный GET параметр id");
	}
} else die("Не передан GET параметр id");

require __DIR__ . '/../autoload.php';

use App\Models\Article;

$article = Article::findById($_GET['id']);

if(isset($_POST) && isset($_POST['save']) && isset($_POST['title']) && isset($_POST['content'])) {
	$article = Article::findById($article->id);
	$article->title = $_POST['title'];
	$article->lead = $_POST['content'];
	$article->save();
}

include __DIR__ . '/../App/Views/admin/edit.php';