<?php

	ini_set('display_errors', true);
	error_reporting(E_ALL);

	require_once 'database.php';

	$query = $pdo->query('SELECT * FROM musics');
	$playlist = $query->fetchAll();

	$result = count($playlist);
	$id = rand(0, $result - 1);

	$music = $playlist[$id];

	// echo '<pre>';
	// print_r($music);
	// echo '</pre>';

	if(!empty($music->movie_id))
	{
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/movie/$music->movie_id?api_key=2fb5cd2aa5d0d9868fcd75aba6d96451");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  "Accept: application/json"
		));
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		$all = json_decode($response);
	}

	if (isset($_POST['ajax'])) echo json_encode(array(
		'music' => $music,
		'movie' => $all
	));

	// echo '<pre>';
	// print_r($all);
	// echo '</pre>';

?>