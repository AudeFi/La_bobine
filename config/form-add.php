<?php

if(!empty($_POST['add'])){

	$music_title  	  = '';
	$music_link   = '';
	$movie_id = '';
	$movie_name = '';
	$composer = '';

	$music_title      	= strip_tags(trim($_POST['music_title']));
	$composer     		= strip_tags(trim($_POST['composer']));
	$music_link       	= strip_tags(trim($_POST['music_link']));

	if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $music_link, $match)) {
    $music_link= $match[1];
	}

	$movie_id       	= strip_tags($_POST['movie_id']);
	$movie_name       	= strip_tags(trim($_POST['movie_name']));

	$prepare = $pdo->prepare('INSERT INTO validation_musics (movie_name,movie_id,music_title,composer,music_link) VALUES (:movie_name,:movie_id,:music_title,:composer,:music_link)');
	$prepare->bindValue('movie_name',$movie_name);
	$prepare->bindValue('movie_id',$movie_id);
	$prepare->bindValue('music_title',$music_title);
	$prepare->bindValue('composer',$composer);
	$prepare->bindValue('music_link',$music_link);
	
	$execute = $prepare->execute();
}