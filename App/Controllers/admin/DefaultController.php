<?php

namespace App\Controllers\Admin;


use App\Controller;
use App\Models\{
	Article,
	Author
};
use App\Exceptions\Http\{
	Http404Exception,
	Http415Exception
};
use App\Exceptions\Model\ItemNotFoundException;


class DefaultController extends Controller
{

	protected function actionIndex()
	{
		$articles = Article::findAll();
		$this->view->articles = $articles;
		$this->view->display(__DIR__ . '/../../Views/admin/default/index.php');
	}

	protected function actionAdd()
	{
		$authors = Author::findAll();
		if(isset($_POST['save'])) {
			$article = new Article();
			if(isset($_POST['author'])) {
				try {
					$author_id = filter_input(INPUT_POST, 'author', FILTER_VALIDATE_INT);
					$author = Author::findById($author_id);
					$article->author_id = $author->id;
				} catch (ItemNotFoundException $e) {
					throw new Http404Exception;
				}
			}
			$article->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
			$article->lead = filter_input(INPUT_POST, 'lead', FILTER_SANITIZE_STRING);
			$article->save();
		}
		$this->view->authors = $authors;
		$this->view->display(__DIR__ . '/../../Views/admin/default/add.php');
	}

	protected function actionEdit()
	{
		try {
			$id = Article::validateInputGet('id', FILTER_VALIDATE_INT);
			$article = Article::findById($id);
		} catch (ItemNotFoundException $e) {
			throw new Http404Exception;
		} catch (\InvalidArgumentException $e) {
			throw new Http415Exception;
		}
		if (isset($_POST['save'])) {
			$article->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
			$article->lead = filter_input(INPUT_POST, 'lead', FILTER_SANITIZE_STRING);
			$article->save();
		}
		$this->view->article = $article;
		$this->view->display(__DIR__ . '/../../Views/admin/default/edit.php');
	}

	protected function actionDelete()
	{
		$id = Article::validateInputGet('id', FILTER_VALIDATE_INT);
		$article = Article::findById($id);
		if (!empty($article)) {
			$article->delete();
		}
		header('Location:/admin/');
		exit();
	}

}