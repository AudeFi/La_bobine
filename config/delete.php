<?php

require 'database.php';
require 'options.php';

$id = $_GET['id'];

if(!empty($id)) {
	$prepare = $pdo->prepare("DELETE FROM validation_musics WHERE id='".$id."'");
	$execute = $prepare->execute();
}

header('Location: ' . URL . 'admin');
exit;