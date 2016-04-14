<?php

require 'database.php';
require 'options.php';

$id = $_GET['id'];

$query = $pdo->query("SELECT * FROM validation_musics WHERE id='".$id."'");
$ligne = $query->fetchAll();

echo '<pre>';
print_r($ligne) ;
echo '</pre>';

$movie_name = $ligne[0]->movie_name;
$movie_id = $ligne[0]->movie_id;
$music_title = $ligne[0]->music_title;
$composer = $ligne[0]->composer;
$music_link = $ligne[0]->music_link;
$pseudo = $ligne[0]->add_by;

/*$query = $pdo->query("SELECT * FROM musics WHERE movie_name='".$movie_name."' AND music_title='".$music_title."'");
$already_exist = $query->fetchAll();*/

/*$already_exist = $query->fetch();*/

/*if(!empty($already_exist)){*/
/*if(!empty($already_exist)){*/

	if(!empty($id)) {

	$prepare = $pdo->prepare('INSERT INTO musics (movie_name,movie_id,music_title,composer,music_link,add_by) VALUES (:movie_name,:movie_id,:music_title,:composer,:music_link,:add_by)');
			$prepare->bindValue('movie_name',$movie_name);
			$prepare->bindValue('movie_id',$movie_id);
			$prepare->bindValue('music_title',$music_title);
			$prepare->bindValue('composer',$composer);
			$prepare->bindValue('music_link',$music_link);
			$prepare->bindValue('add_by',$pseudo);
			$execute = $prepare->execute();

	$prepare = $pdo->prepare("DELETE FROM validation_musics WHERE id='".$id."'");
	$execute = $prepare->execute();

	} 
/*}*/
/*header('Location: ' . URL . 'profil');
exit;*/