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

	echo $music->music_link;

	// echo '<pre>';
	// print_r($all);
	// echo '</pre>';

?>

<section>
	
	<div id="player"></div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      var music_id = <?=$music->music_link?>;
      console.log(music_id);
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: music_id,
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>

	<p>Title : <?= $music->music_title ?></p>
	<p>Composer : <?= $music->composer ?></p>
	<p>Affiche : <img src="http://image.tmdb.org/t/p/w500/<?= $all->poster_path ?>" alt="">




</section>