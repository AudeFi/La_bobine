<?php
	
	/*$num_playlist = empty($_GET['id']) ? '' : $_GET['id'];


	if($num_playlist == '1'){
		$query = $pdo->query('SELECT * FROM playlists_has_musics INNER JOIN playlists ON playlists_has_musics.id_playlists = playlists.id INNER JOIN musics ON playlists_has_musics.id_musics = musics.id WHERE playlists.id = 1');
		$playlist = $query->fetchAll();
	}		
	else if($num_playlist == '2') {
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

	$counter = 0;
	$historique = [];*/

	require 'config/home-player.php';
	
?>

	<div class="section-2">

		<div class="info-film">
		<button class="close"><i class="fa fa-times fa-2x" aria-hidden="true"></i></button>
	
			<div class="film-text">
				<p   class="movie_title"><?= $all->title ?></p>
				<p   class="director">Directored by <?= $credits->crew[0]->name ?></p>
				<p   class="actors">With <?= $credits->cast[0]->name ?> | <?= $credits->cast[1]->name ?> | <?= $credits->cast[2]	->	name ?></p>
				<p   class="genre">Genre : <?= $all->genres[0]->name ?></p>
				<p   class="release_date">Release Date : <?= $all->release_date ?></p>
				<p   class="overview">Overview : <?= $all->overview ?></p>
	
				<button class="amazon_link_2"><a class="amazon_music" href="https://www.amazon.fr/s/ref=nb_sb_noss_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91	&url=search-alias%3Ddvd&field-keywords=<?= $all->title ?>+Bande+Originale" TARGET="_blank">Discover On Amazon</a></button>
			</div>

				<img class="poster" src="http://image.tmdb.org/t/p/w500/<?= $all->poster_path ?>" alt="">
		</div>

	</div>

	<section class="section-1">
	
	<div class="music-info">

	<p class="music_title"><?= $music->music_title ?></p>
	<p class="music_composer"><?= $music->composer ?></p>
	
	<button class="see_more">See More</button>
	<button class="amazon_link"><a class="amazon_music" href="https://www.amazon.fr/s/ref=nb_sb_noss_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&url=search-alias%3Dpopular&field-keywords=<?= $all->title ?>+Bande+Originale" TARGET="_blank">Discover On Amazon</a></button>

	</div>

	<div class="musicplayer">
		<div id="player"></div>
		<div class="eq"><i class="fa fa-volume-up" aria-hidden="true"></i></div>
		<div class="reload"><i class="fa fa-forward" aria-hidden="true"></i></div>

		<div class="timebar">
        	<div class="current_time">
        	</div>
    	</div>
    </div>

</section>

<script>
	var music_id = '<?=$music->music_link?>';
</script>
<script src="<?= URL ?>src/js/app/home-ajax.js"></script>