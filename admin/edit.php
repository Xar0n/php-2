<?php
if(filter_has_var(INPUT_GET, 'id')) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('Некорректный параметр id');
} else {
    die('Не передан параметр id');
}

require __DIR__ . '/../autoload.php';

use App\View;
use App\Models\{
	Article,
	Author
};

$errors = array();
$article = Article::findById($id) or die('Запись не найдена');

if (isset($_POST, $_POST['save'])) {
    if (empty($_POST['title'])) {
        $errors[] = 'Заполните поле Название';
    } if (empty($_POST['lead'])) {
        $errors[] = 'Заполните поле Содержание';
    } if (empty($_POST['author'])) {
        $errors[] = 'Заполните поле Автор';
    }

    if (empty($errors)) {
        $author = Author::findById($article->author_id);
        $author->name = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
        $author->save();

        $article->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $article->lead = filter_input(INPUT_POST, 'lead', FILTER_SANITIZE_STRING);
        $article->save();
    }
}
$view = new View;
$view->article = $article;
$view->errors = $errors;
$view->display(__DIR__ . '/../App/Views/admin/edit.php');
