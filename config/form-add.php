<?php

if(!empty($_POST['add'])){

	$title  = '';
	$link   = '';
	$movies = '';

	$title      = strip_tags(trim($_POST['title']));
	$link       = strip_tags(trim($_POST['link']));
	$movies     = strip_tags(trim($_POST['movies']));

	$prepare = $pdo->prepare('INSERT INTO validation_musics (movies,title,link) VALUES (:movies,:title,:link)');
	$prepare->bindValue('movies',$movies);
	$prepare->bindValue('title',$title);
	$prepare->bindValue('link',$link);



	$execute = $prepare->execute();
}