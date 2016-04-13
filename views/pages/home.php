<?php
	require 'config/home-player.php';
?>

<section>


	
	<div id="player"></div>
	<div class="eq"></div>
	<div class="reload"></div>

	<div class="timebar">
        <div class="current_time">
        </div>
    </div>

	<p>Title : <span class="music_title"><?= $music->music_title ?></span></p>
	<p>Composer : <span class="music_composer"><?= $music->composer ?></span></p>
	<img src="http://image.tmdb.org/t/p/w500/<?= $all->poster_path ?>" alt="" class="poster">
	<p>Film Name : <span class="movie_title"><?= $all->title ?></span></p>
	<p>Genre : <span class="genre"><?= $all->genres[0]->name ?></span></p>
	<p>Overview : <span class="overview"><?= $all->overview ?></span></p>
	<p>Release Date : <span class="release_date"><?= $all->release_date ?></span></p>
	<p>Director : <span class="director"><?= $credits->crew[0]->name ?></span></p>
	<p>Main Actors : <span class="actors"><?= $credits->cast[0]->name ?> / <?= $credits->cast[1]->name ?> / <?= $credits->cast[2]->name ?> </span></p>

</section>

<script>
	var music_id = '<?=$music->music_link?>';
</script>