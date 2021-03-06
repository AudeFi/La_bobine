<?php

	require_once 'database.php';


	$num_playlist = empty($_GET['id']) ? '' : $_GET['id'];

	// PLAYLISTS

	if($num_playlist == '1'){
		$query = $pdo->query('SELECT * FROM playlists_has_musics INNER JOIN playlists ON playlists_has_musics.id_playlists = playlists.id INNER JOIN musics ON playlists_has_musics.id_musics = musics.id WHERE playlists.id = 1');
		$playlist = $query->fetchAll();
	}		
	else if($num_playlist == '2'){
		$query = $pdo->query('SELECT * FROM playlists_has_musics INNER JOIN playlists ON playlists_has_musics.id_playlists = playlists.id INNER JOIN musics ON playlists_has_musics.id_musics = musics.id WHERE playlists.id = 2');
		$playlist = $query->fetchAll();
	}	
	else if($num_playlist == '3') {
		$query = $pdo->query('SELECT * FROM playlists_has_musics INNER JOIN playlists ON playlists_has_musics.id_playlists = playlists.id INNER JOIN musics ON playlists_has_musics.id_musics = musics.id WHERE playlists.id = 3');
		$playlist = $query->fetchAll();
	}
	else {
		$query = $pdo->query('SELECT * FROM musics');
		$playlist = $query->fetchAll();
	}

	$result = count($playlist);
	$id_music = rand(0, $result - 1);

	$music = $playlist[$id_music];
	

// API MOVIE ID FOR SEARCH MOVIE AND HAVE INFORMATIONS 
	if(!empty($music->movie_id))
	{
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/movie/$music->movie_id?api_key=2fb5cd2aa5d0d9868fcd75aba6d96451&language=fr");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  "Accept: application/json"
		));
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		$all = json_decode($response);
	}

	if(!empty($music->movie_id))
	{
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/movie/$music->movie_id/credits?api_key=2fb5cd2aa5d0d9868fcd75aba6d96451&language=fr");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  "Accept: application/json"
		));
		
		$response_2 = curl_exec($ch);
		curl_close($ch);
		
		$credits = json_decode($response_2);
	}

	if (isset($_POST['ajax'])) echo json_encode(array(
		'music' => $music,
		'movie' => $all,
		'credits' => $credits
	));
