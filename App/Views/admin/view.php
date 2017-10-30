<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Просмотр новости</title>
</head>
<body>
    <b><a href="index.php">Главная</a></b>
    <b><a href="editor.php">Редактор</a></b><br>
    <b>Номер новости:</b><?= $article->id ?><br>
    <b>Название:</b><?= $article->title ?><br>
    <b>Содержание:</b><p><?= nl2br($article->lead) ?></p><br>
</body>
</html>


