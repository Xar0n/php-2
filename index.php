<?php
require __DIR__ . '/autoload.php';

use App\Models\Article;
use App\View;

$articles = Article::selectLimitDesc(3);
$view = new View;
$view->articles = $articles;
$view->display(__DIR__ . '/App/Views/article.php');
