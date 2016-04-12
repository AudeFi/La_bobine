<?php

	$query = $pdo->query('SELECT * FROM musics');
	$playlist = $query->fetchAll();

	echo '<pre>';
	print_r($playlist);
	echo '</pre>';

	$result = count($playlist);
	$id = rand(0, $result - 1);

	echo $id;

	$music = $playlist[$id];

	echo '<pre>';
	print_r($music);
	echo '</pre>';

?>








<section>
	



	<iframe class="ytvideo" width="560" height="315" src="<?= $music->link ?>" frameborder="0" allowfullscreen>
		
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