<h1>3 последние новости</h1>
<?php foreach ($articles as $article):?>
	<b>Номер новости:</b><a href="article.php?id=<?= $article->id ?>"><?= $article->id ?></a><br>
    <b>Название:</b><?= $article->title ?><br>
    <b>Содержание:</b><p><?= $article->lead ?></p><br>
    <br><br><br><br><br>
<?php endforeach;?>