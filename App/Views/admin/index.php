<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Все новости</title>
</head>
<body>
    <b><a href="editor.php">Редактор</a></b>
	<h2>Все новости</h2>
	<?php foreach ($articles as $article):?>
		<b>Номер новости:</b><a href="view.php?id=<?= $article->id ?>"><?= $article->id ?></a><br>
		<b>Название:</b><?= $article->title ?><br>
		<b>Содержание:</b><p><?= nl2br($article->lead) ?></p><br>
		<br><br><br><br><br>
	<?php endforeach;?>
</body>
</html>
