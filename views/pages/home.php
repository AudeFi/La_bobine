<?php
	require 'config/home-player.php';
?>

<section>
	
	<div id="player"></div>
	<div class="eq"></div>

	<div class="timebar">
            <div class="current_time"></div>
    </div>

    <div class="reload"></div>

	<p>Title : <span class="title"><?= $music->music_title ?></span></p>
	<p>Composer : <span class="composer"><?= $music->composer ?></span></p>
	<p>Affiche : <img src="http://image.tmdb.org/t/p/w500/<?= $all->poster_path ?>" alt="" class="poster"></p>

</section>

<script>
	var music_id = '<?=$music->music_link?>';
</script>