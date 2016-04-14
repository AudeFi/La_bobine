<?php

	require 'config/home-player.php';
	
?>

<section>


	<p class="music_title"><?= $music->music_title ?></p>
	<p class="music_composer"><?= $music->composer ?></p>
	
	<button class="see_more">See More</button>
	<button class="amazon_link"><a class="amazon_music" href="https://www.amazon.fr/s/ref=nb_sb_noss_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&url=search-alias%3Dpopular&field-keywords=<?= $all->title ?>+Bande+Originale" TARGET="_blank">Discover On Amazon</a></button>

	<div class="musicplayer">
	<div id="player"></div>
	<div class="eq"><i class="fa fa-volume-up fa-2x" aria-hidden="true"></i></div>
	<div class="reload"><i class="fa fa-forward fa-2x" aria-hidden="true"></i></div>

	<div class="timebar">
        <div class="current_time">
        </div>
    </div>
    </div>

</section>

<section>

<img src="http://image.tmdb.org/t/p/w500/<?= $all->poster_path ?>" alt="" class="poster">
	<p>Film Name : <span class="movie_title"><?= $all->title ?></span></p>
	<p>Genre : <span class="genre"><?= $all->genres[0]->name ?></span></p>
	<p>Overview : <span class="overview"><?= $all->overview ?></span></p>
	<p>Release Date : <span class="release_date"><?= $all->release_date ?></span></p>
	<p>Director : <span class="director"><?= $credits->crew[0]->name ?></span></p>
	<p>Main Actors : <span class="actors"><?= $credits->cast[0]->name ?> / <?= $credits->cast[1]->name ?> / <?= $credits->cast[2]->name ?> </span></p>
	<div><a class="amazon_movie" href="https://www.amazon.fr/s/ref=nb_sb_noss_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&url=search-alias%3Ddvd&field-keywords=<?= $all->title ?>" TARGET="_blank">Discover On Amazon</a></div>

</section>

<script>
	var music_id = '<?=$music->music_link?>';
</script>
<script src="<?= URL ?>src/js/app/home-ajax.js"></script>