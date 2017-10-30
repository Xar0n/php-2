<?php
if(isset($_GET['id'])) {
	$id = (int)trim($_GET['id']);
	if (!$id) {
		die("Некорректный GET параметр id");
	}
} else die("Не передан GET параметр id");

require __DIR__ . '/../autoload.php';

$article = App\Models\Article::findById($_GET['id']);
include __DIR__ . '/../App/Views/admin/view.php';