<?php
use App\Models\Article;

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новостная админ панель</title>
</head>
<body>
<b><a href="/admin/default/add">Добавить новость</a></b>
<?php
if (!empty($articles)) {
	$table = new App\AdminDataTable(
		$articles,
		[
			function (Article $article) {
				return $article->id;
			},
			function (Article $article) {
				return $article->title;
			},
			function (Article $article) {
				if (empty($article->author)) {
					return 'Автора нет';
				}
				return $article->author->name;
			}
		]
	);
	$table->render();
}
?>
</body>
</html>
