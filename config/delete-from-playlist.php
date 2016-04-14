<?php

require 'database.php';
require 'options.php';

$id = $_GET['id'];
$playlist = $_GET['playlist'];

if(!empty($id)) {
	$prepare = $pdo->prepare("DELETE FROM playlists_has_musics WHERE id_playlists='".$playlist."' AND id_musics='".$id."'");
	$execute = $prepare->execute();
}

header('Location: ' . URL . 'profil');
exit;