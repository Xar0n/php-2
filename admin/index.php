<?php
require __DIR__ . '/../autoload.php';

use App\View;
use App\Models\{Article, Author};

if(isset($_POST, $_POST['delete'], $_POST['id_article'])) {
	$id = filter_input(INPUT_POST, 'id_article', FILTER_VALIDATE_INT);
		if ($id && $article = Article::findById($id)) {
			$article->delete();
			if ($author = Author::findById($article->author_id))
				$author->delete();
		}
}

$articles = Article::findAll();
$view = new View;
$view->articles = $articles;
$view->display(__DIR__ . '/../App/Views/admin/index.php');
