<?php

namespace App\Controllers\admin;


use App\Controller;
use App\Models\{
	Article,
	Author
};


class DefaultController extends Controller
{

	protected function actionIndex()
	{
		$articles = Article::findAll();
		$this->view->articles = $articles;
		$this->view->display(__DIR__ . '/../../Views/admin/default/index.php');
	}

	protected function actionEdit()
	{
		$id = $this->validateInputGet('id', FILTER_VALIDATE_INT);
		$article = Article::findById($id);
		if (empty($article)) {
			http_response_code(404);
			exit();
		}

		if (isset($_POST, $_POST['save'], $_POST['title'],
			$_POST['lead'], $_POST['author'])) {
			$author_name = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
			$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
			$lead = filter_input(INPUT_POST, 'lead', FILTER_SANITIZE_STRING);
			$article->edit($article->author_id, $title, $author_name, $lead);
		}

		$this->view->article = $article;
		$this->view->display(__DIR__ . '/../../Views/admin/default/edit.php');
	}

	protected function actionDelete()
	{
		$id = $this->validateInputGet('id', FILTER_VALIDATE_INT);
		$article = Article::findById($id);
		if (!empty($article)) {
			$article->delete();
			$author = Author::findById($article->author_id);
			if (!empty($author)) {
				$author->delete();
			}
		}
		header('Location:/admin/');
		exit();
	}

	protected function actionAdd()
	{
		if (isset($_POST, $_POST['add'], $_POST['title'], $_POST['lead'], $_POST['author'])) {
			$author_name = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
			$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
			$lead = filter_input(INPUT_POST, 'lead', FILTER_SANITIZE_STRING);
			$article = new Article;
			$article->add($title, $author_name, $lead);
		}

		$this->view->display(__DIR__ . '/../../Views/admin/default/add.php');
	}
}