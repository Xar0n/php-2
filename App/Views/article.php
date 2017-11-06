<h1>3 последние новости</h1>
<?php foreach ($articles as $article):?>
	<b>Номер новости:</b><a href="/article.php?id=<?php echo $article->id;?>"><?php echo $article->id;?></a><br>
    <b>Название:</b><?php echo $article->title;?><br>
    <b>Содержание:</b><p><?php echo $article->lead;?></p><br>
    <br><br><br><br><br>
<?php endforeach;?>