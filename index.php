<?php
require __DIR__ . '/autoload.php';

use App\Models\Article;

$articles = Article::threeLastArticle();
include __DIR__ . '/App/Views/article.php';
