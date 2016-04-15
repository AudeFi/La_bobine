<?php

$errors = array();
$success = array();
$music_title = '';
$music_link  = '';
$movie_id    = '';
$movie_name  = '';
$composer    = '';

if(!empty($_POST['add'])){

	if (empty($_POST['music_title'])){
		$errors['music_title'] = "Veuillez renseigner un nom de musique";
	}
	else {
		$music_title = strip_tags(trim($_POST['music_title']));
	}
	if (empty($_POST['composer'])){
		$errors['composer'] = "Veuillez renseigner un nom de compositeur";
	}
	else {
		$composer = strip_tags(trim($_POST['composer']));
	}
	if (empty($_POST['music_link'])){
		$errors['music_link'] = "Veuillez renseigner un lien youtube";
	}
	else {
		$music_link = strip_tags(trim($_POST['music_link'])); //YOUTUBE ID VIDEO REGEX
		if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $music_link, $match)) {
	    	$music_link= $match[1];
		}
	}

	if (empty($_POST['movie_name'])){
		$errors['movie_name'] = "Veuillez selectionner un film";
	}
	else {
		$movie_id = strip_tags(trim($_POST['movie_id']));
		$movie_name = strip_tags(trim($_POST['movie_name']));
	}

	if(empty($errors))
	{	
		$user = $_SESSION['user']['pseudo'];

		$query = $pdo->query('SELECT contribution FROM users WHERE pseudo="'.$_SESSION['user']['pseudo'].'"');
		$contri = $query->fetch();
		$contri_plus = $contri->contribution + 1;
		$prepare = $pdo->prepare('UPDATE users SET contribution = "'.$contri_plus.'" WHERE pseudo="'.$_SESSION['user']['pseudo'].'"');
		$execute = $prepare->execute();

		$prepare = $pdo->prepare('INSERT INTO validation_musics (movie_name,movie_id,music_title,composer,music_link,add_by) VALUES (:movie_name,:movie_id,:music_title,:composer,:music_link,:add_by)');
		$prepare->bindValue('movie_name',$movie_name);
		$prepare->bindValue('movie_id',$movie_id);
		$prepare->bindValue('music_title',$music_title);
		$prepare->bindValue('composer',$composer);
		$prepare->bindValue('music_link',$music_link);
		$prepare->bindValue('add_by',$user);
		
		$execute = $prepare->execute();

		if(!$execute){
			$errors[] = "Erreur lors de l'enregistrement";
		}
		else
		{
			$success[] = 'La musique a été soumise. Elle sera accepté ou refusée par les administrateurs.';
			$music_title = '';
			$music_link  = '';
			$movie_id    = '';
			$movie_name  = '';
			$composer    = '';
		}
	}
}