<?php
require __DIR__ . '/../autoload.php';

use App\Models\Article;
if(isset($_POST) && isset($_POST['add']) && isset($_POST['title']) && isset($_POST['lead'])) {
	$article = new Article();
	$article->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$article->lead = filter_input(INPUT_POST, 'lead', FILTER_SANITIZE_STRING);
	$article->save();
}

include __DIR__ . '/../App/Views/admin/add.php';