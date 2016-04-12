<?php

	$query = $pdo->query('SELECT * FROM musics');
	$playlist = $query->fetchAll();

	// echo '<pre>';
	// print_r($playlist);
	// echo '</pre>';

	$result = count($playlist);
	$id = rand(0, $result - 1);

	// echo $id;

	$music = $playlist[$id];

	echo '<pre>';
	print_r($music);
	echo '</pre>';

	if(!empty($music->movies))
	{
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/search/movie?api_key=2fb5cd2aa5d0d9868fcd75aba6d96451&query='.$music->movies.'");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  "Accept: application/json"
		));
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		$all = json_decode($response);
	}

	echo '<pre>';
	print_r($all->results);
	echo '</pre>';

?>

<section>
	



	<iframe class="ytvideo" width="560" height="315" src="<?= $music->link ?>&autoplay=1" frameborder="0" allowfullscreen>
		
	</iframe>

	<script>
		var video = document.querySelector('.ytvideo');
		var url = video.src;
		url = url.replace("watch?v=", "v/");
		video.src = url;

	</script>

	<p>Title : <?= $music->title ?></p>
	<p>Composer : <?= $music->composer ?></p>





</section>