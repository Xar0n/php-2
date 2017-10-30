<?php
require __DIR__ . '/autoload.php';

use App\Models\Article;

$articles = Article::selectLimit(3);
include __DIR__ . '/App/Views/article.php';
