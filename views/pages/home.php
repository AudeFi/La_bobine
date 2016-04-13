<?php

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

	// echo '<pre>';
	// print_r($all);
	// echo '</pre>';

?>

<section>
	
	<script>
	function toggleVideo(state) {
    // if state == 'hide', hide. Else: show video
    var div = document.getElementById("popupVid");
    var iframe = div.getElementsByTagName("iframe")[0].contentWindow;
    div.style.display = state == 'hide' ? 'none' : '';
    func = state == 'hide' ? 'pauseVideo' : 'playVideo';
    iframe.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
	}
	</script>


	<iframe class="ytvideo" width="640" height="390" src="<?= $music->music_link ?>?enablejsapi=1" frameborder="0" allowfullscreen>
	</iframe>

	<script>
		var video = document.querySelector('.ytvideo');
		var url = video.src;
		url = url.replace("watch?v=", "v/");
		video.src = url;

	</script>

	<p>Title : <?= $music->music_title ?></p>
	<p>Composer : <?= $music->composer ?></p>
	<p>Affiche : <img src="http://image.tmdb.org/t/p/w500/<?= $all->poster_path ?>" alt="">




</section>