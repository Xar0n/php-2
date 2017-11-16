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

<table border="1">
	<tr>
		<th>Номер</th>
		<th>Название</th>
        <th>Автор</th>
		<th colspan="2">Действия</th>
	</tr>
    <?php if (!empty($articles)) : ?>
        <?php foreach ($articles as $article) : ?>
            <tr>
                <td><?php echo $article->id;?></a></td>
                <td><?php echo htmlspecialchars($article->title);?></td>
                <?php if (!empty($article->author)) : ?>
                <td><?php echo htmlspecialchars($article->author->name);?></td>
                <?php else : ?>
                    <td>Автора нет</td>
                <?php endif; ?>
                <td><a href="/admin/default/edit/?id=<?php echo $article->id; ?>">Редактировать</a></td>
                <td><a href="/admin/default/delete/?id=<?php echo $article->id; ?>">Удалить</a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
</body>
</html>

