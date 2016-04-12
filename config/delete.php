<?php

require 'database.php';

$id = $_GET['id'];

if(!empty($id)) {

$prepare = $pdo->prepare("DELETE FROM validation_musics WHERE id='".$id."'");
$execute = $prepare->execute();

} 