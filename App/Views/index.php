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
<b><a href="/add.php">Добавить новость</a></b>

<table border="1">
	<tr>
		<th>Номер</th>
		<th>Название</th>
        <th>Автор</th>
		<th colspan="2">Действия</th>
	</tr>
    <?php if(!empty($articles)):?>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?php echo $article->id;?></a></td>
                <td><?php echo htmlspecialchars($article->title);?></td>
                <td><?php echo htmlspecialchars($article->author->name);?></td>
                <td><a href="/edit.php?id=<?php echo $article->id;?>">Редактировать</a></td>
                <form method="post">
                    <td>
                        <input type="hidden" name="id_article" value="<?php echo $article->id;?>">
                        <input type="submit" name="delete" value="Удалить">
                    </td>
                </form>
            </tr>
        <?php endforeach;?>
    <?php endif;?>
</table>
</body>
</html>
