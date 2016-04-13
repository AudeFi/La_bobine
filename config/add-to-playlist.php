<?php

if(!empty($_POST['add-to-playlist'])){
	if(empty($_POST['name_playlist'])){
		echo "Selectionnez une playlist";
	}
	else if (empty($_POST['name_music'])){
		echo 'Selectionnez des films';
	}
	else {
		$musics   		 = $_POST['name_music'];
		$playlist_number = trim($_POST['name_playlist']);

	foreach ($musics as $music){
		$query = $pdo->query('SELECT * FROM playlists_has_musics WHERE id_playlists ='.$playlist_number.' AND id_musics ='.$music);
		$request = $query->fetchAll();
		if (empty($request)){
			$prepare = $pdo->prepare("INSERT INTO playlists_has_musics(id_playlists,id_musics) VALUES (:id_playlists,:id_musics)");
			$prepare->bindValue('id_playlists',$playlist_number);
			$prepare->bindValue('id_musics',$music);
			$execute = $prepare->execute();
		}
	}

	/*echo $playlist_number;

	echo '<pre>';
	print_r($musics);
	echo '</pre>';*/


	}

	/*$prepare = $pdo->prepare('INSERT INTO validation_musics (movie_name,movie_id,music_title,composer,music_link) VALUES (:movie_name,:movie_id,:music_title,:composer,:music_link)');
	$prepare->bindValue('movie_name',$movie_name);
	$prepare->bindValue('movie_id',$movie_id);
	$prepare->bindValue('music_title',$music_title);
	$prepare->bindValue('composer',$composer);
	$prepare->bindValue('music_link',$music_link);
	
	$execute = $prepare->execute();*/
}