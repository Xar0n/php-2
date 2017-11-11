<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<b>Номер новости:</b><a href="/article.php?id=<?php echo $article->id;   ?>"><?php echo $article->id; ?></a><br>
	<b>Название:</b><?php echo $article->title; ?><br>
	<?php if(!empty($article->author)): ?>
		<b>Автор:</b><?php echo $article->author->name; ?><br>
	<?php else: ?>
		<td>Автора нет</td>
	<?php endif; ?>
	<b>Содержание:</b><p><?php echo $article->lead; ?></p><br>
<br><br><br><br><br>
</body>
</html>

