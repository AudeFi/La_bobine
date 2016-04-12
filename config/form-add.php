<?php

$name='';

if(!empty($_POST['name']))
	{
		$name = strip_tags(trim($_POST['name']));
		$name=urlencode($name);

		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/search/movie?api_key=2fb5cd2aa5d0d9868fcd75aba6d96451&query='.$name.'");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  "Accept: application/json"
		));
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		$result = json_decode($response);

		$count = count($result->results);

		$response = '';
		$response = array(); 

		for($i = 0; $i <= $count - 1; $i++){
			if($i > 6)
 				{
 					break 1;
 				}
		$response[] = $result->results[$i]->title;
		}

		echo json_encode($response);


			// si l'utilisateur rentre un nom de film qui n'est pas dans la liste, il faudra afficher une erreur
			// gerer l'ensemble en ajax pour plus de confort
	}

	if(!empty($_POST['add'])){

$title= '';
$link = '';


	$title      = strip_tags(trim($_POST['title']));
	$link      = strip_tags(trim($_POST['link']));

	$prepare = $pdo->prepare('INSERT INTO validation_musics (title,link) VALUES (:title,:link)');
	$prepare->bindValue('title',$title);
	$prepare->bindValue('link',$link);


	// json_encode($response)
	$execute = $prepare->execute();
}