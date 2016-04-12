<?php

require 'database.php';

$id = $_GET['id'];

$query = $pdo->query("SELECT * FROM validation_musics WHERE id='".$id."'");
$ligne = $query->fetchAll();

$title = $ligne[0]->title;
$link = $ligne[0]->link;

if(!empty($id)) {

$prepare = $pdo->prepare('INSERT INTO musics (title,link) VALUES (:title,:link)');
		$prepare->bindValue('title',$title);
		$prepare->bindValue('link',$link);
		$execute = $prepare->execute();

$prepare = $pdo->prepare("DELETE FROM validation_musics WHERE id='".$id."'");
$execute = $prepare->execute();

} 