<?php
require __DIR__ . '/../autoload.php';

use App\Models\Article;

if(isset($_POST) && isset($_POST['add']) && isset($_POST['title']) && isset($_POST['lead'])) {
	$article = new Article();
	$article->title = $_POST['title'];
	$article->lead = $_POST['lead'];
	$article->save();
}

include __DIR__ . '/../App/Views/admin/add.php';