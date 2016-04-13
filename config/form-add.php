<?php

if(!empty($_POST['add'])){

	$title  = '';
	$link   = '';
	$movies = '';
	$id_movie = '';

	$title      = strip_tags(trim($_POST['music_title']));
	$link       = strip_tags(trim($_POST['music_link']));
	$movies     = strip_tags(trim($_POST['movies']));

	$prepare = $pdo->prepare('INSERT INTO validation_musics (movies,title,link,id_movie) VALUES (:movies,:title,:link,:id_movie)');
	$prepare->bindValue('movies',$movies);
	$prepare->bindValue('title',$title);
	$prepare->bindValue('link',$link);



	$execute = $prepare->execute();
}