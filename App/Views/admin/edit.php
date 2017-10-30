<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Редактирование новости</title>
</head>
<body>
<b><a href="index.php">Редактор</a></b><br>
<b>Редактирование новости номер:<?= $article->id?><b>
<form method="post" name="edit">
    <input type="text" name="title" style="width: 600px" value="<?= $article->title?>"><br>
    <textarea name="lead" style="width: 600px;height: 200px"><?= htmlspecialchars($article->lead);?></textarea><br>
    <input type="submit" name="save" value="Сохранить">
</form>
</body>
</html>

