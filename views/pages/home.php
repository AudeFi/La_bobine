<?php

	require 'config/home-player.php';
	
?>

											<!-- INFORMATION MOVIE -->

	<div class="section-2">
		<div class="info-film">

			<button class="close">
				<i class="fa fa-times fa-2x" aria-hidden="true"></i>
			</button>
	
			<div class="film-text">
				<p   class="movie_title"><?= $all->title ?></p>
				<p   class="director">Réalisé Par <?= $credits->crew[0]->name ?></p>
				<p   class="actors">Avec <?= $credits->cast[0]->name ?> | <?= $credits->cast[1]->name ?> | <?= $credits->cast[2]	->	name ?></p>
				<p   class="genre">Genre : <?= $all->genres[0]->name ?></p>
				<p   class="release_date">Date de Sortie : <?= $all->release_date ?></p>
				<p   class="overview">Résumé : <?= $all->overview ?></p>
	
				<button class="amazon_link_2">
					<a class="amazon_movie" href="https://www.amazon.fr/s/ref=nb_sb_noss_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&url=search-alias%3Ddvd&field-keywords=<?= $all->title ?>" TARGET="_blank">Acheter sur Amazon</a>
				</button>
			</div>

			<img id="poster" class="poster" src="http://image.tmdb.org/t/p/w500/<?= $all->poster_path ?>" alt="">

		</div>
	</div>

											<!-- END INFORMATION MOVIE -->

	<section class="section-1">
		<div class="music-info">
			
				<p class="music_title"><?= $music->music_title ?></p>
				<p class="music_composer"><?= $music->composer ?></p>
				<div class="time-info">
					<div id="time"></div> / <div id="duration"></div>
				</div>
	
			<div class="button">
				<button class="see_more">Voir Plus</button>
				<button class="amazon_link">
					<a class="amazon_music" href="https://www.amazon.fr/s/ref=nb_sb_noss_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&url=search-alias%3Dpopular&field-keywords=<?= $all->title ?>+Bande+Originale" TARGET="_blank">Acheter sur Amazon</a>
				</button>
			</div>
		</div>
											<!-- MUSIC PLAYER -->
										
	<div class="musicplayer">
		<div id="player"></div>
		<div class="eq">
			<i class="fa fa-volume-up" aria-hidden="true"></i>
		</div>
		<div class="reload">
			<i class="fa fa-forward" aria-hidden="true"></i>
		</div>
	
											<!-- MUSIC WAVES  -->
		<div id='bars'>
			<div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div><div class='wave'></div>
		</div>

		<div class="timebar">
        	<div class="current_time"></div>
    	</div>
    </div>
</section>

<script>
	var music_id = '<?=$music->music_link?>';
</script>

<script src="<?= URL ?>src/js/app/home-ajax.js"></script>