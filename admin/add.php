<?php
require __DIR__ . '/../autoload.php';

use App\View;
use App\Models\{Article, Author};

if(isset($_POST, $_POST['add'], $_POST['title'], $_POST['lead'], $_POST['author'])) {
	$author = new Author();
	$author->name = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
	$author->save();

	$article = new Article();
	$article->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$article->lead = filter_input(INPUT_POST, 'lead', FILTER_SANITIZE_STRING);
	$article->author_id = $author->id;
	$article->save();
}

$view = new View;
$view->display(__DIR__ . '/../App/Views/admin/add.php');