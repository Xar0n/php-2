<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление новости</title>
</head>
<body>
<b><a href="/index.php">Редактор</a></b><br>
<?php
if(!empty($errors)) {
	foreach ($errors as $error){
		echo "<b>{$error}</b><br>";
	}
}
?>
<h2>Новая статья</h2>
<form method="post"  action="/add.php">
    <label>Название:
    <input type="text" name="title" style="width: 600px">
    </label>
    <br>
    <label>Автор:
    <input type="text" name="author" style="width: 600px">
    </label>
    <br>
    <label>Содержание:<br>
    <textarea name="lead" style="width: 600px;height: 400px"></textarea>
    </label>
    <br>
    <input type="submit" name="add" value="Добавить">
</form>
</body>
</html>