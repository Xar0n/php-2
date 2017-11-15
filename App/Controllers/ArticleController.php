<?php

namespace App\Controllers;


use App\Controller;
use App\Models\Article;
use App\Exceptions\Http\{
	Http404Exception,
	Http415Exception
};
use App\Exceptions\Model\ItemNotFoundException;

class ArticleController extends Controller
{

	protected function actionIndex()
	{
		$articles = Article::selectLimitDesc(3);
		$this->view->articles = $articles;
		$this->view->display(__DIR__ . '/../Views/article/index.php');
	}

	protected function actionOne()
	{
		try {
			$id = Article::validateInputGet('id', FILTER_VALIDATE_INT);
			$article = Article::findById($id);
			$this->view->article = $article;
			$this->view->display(__DIR__ . '/../Views/article/one.php');
		} catch (ItemNotFoundException $e) {
			throw new Http404Exception;
		} catch (\InvalidArgumentException $e) {
			throw new Http415Exception;
		}
	}
}