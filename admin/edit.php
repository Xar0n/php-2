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

if(isset($_POST) && isset($_POST['save']) && isset($_POST['title']) && isset($_POST['lead'])) {
	$article = Article::findById($article->id);
	$article->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);;
	$article->lead = filter_input(INPUT_POST, 'lead', FILTER_SANITIZE_STRING);;
	$article->save();
}

include __DIR__ . '/../App/Views/admin/edit.php';