<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 09.11.2017
 * Time: 15:44
 */

namespace App\Controllers;


use App\Controller;
use App\Models\Article;

class ArticleController extends Controller
{

	protected function actionIndex()
	{
		$articles = Article::selectLimitDesc(3);;
		$this->view->articles = $articles;
		$this->view->display(__DIR__ . '/../Views/article/index.php');
	}

	protected function actionOne()
	{
		$id = $this->validateInputGet('id', FILTER_VALIDATE_INT);

		$article = Article::findById($id);
		if (empty($article)) {
			http_response_code(404);
			exit();
		}

		$this->view->article = $article;
		$this->view->display(__DIR__ . '/../Views/article/one.php');
	}
}