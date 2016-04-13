<?php

	$query = $pdo->query('SELECT * FROM playlists_has_musics INNER JOIN playlists ON playlists_has_musics.id_playlists = playlists.id INNER JOIN musics ON playlists_has_musics.id_musics = musics.id');
	$playlists_has_musics = $query->fetchAll();
	$query = $pdo->query('SELECT * FROM musics');
	$musics = $query->fetchAll();
	$query = $pdo->query('SELECT * FROM playlists');
	$playlists = $query->fetchAll();
	$query = $pdo->query('SELECT * FROM playlists_has_musics INNER JOIN playlists ON playlists_has_musics.id_playlists = playlists.id INNER JOIN musics ON playlists_has_musics.id_musics = musics.id WHERE playlists.id = 1');
	$playlist1 = $query->fetchAll();
	$query = $pdo->query('SELECT * FROM playlists_has_musics INNER JOIN playlists ON playlists_has_musics.id_playlists = playlists.id INNER JOIN musics ON playlists_has_musics.id_musics = musics.id WHERE playlists.id = 2');
	$playlist2 = $query->fetchAll();

?>

<section>
	
<div class="container-playlist">
	<div class="title-container-playlist">
		<h3>Séléctionnez votre playlist</h3>
	</div>
	<div class="playlist-content">
			<div class="playlist-section">
				<a href="<?= URL ?>?id=1">
					<img src="<?= URL ?>src/images/les-classiques.png" alt="les-classiques">
					<h3>Les classiques</h3>
				</a>
			</div>
			<div class="playlist-section">
				<a href="<?= URL ?>?id=2">
					<img src="<?= URL ?>src/images/bonne-humeur.png" alt="bonne-humeur">
					<h3>bonne humeur</h3>
				</a>
			</div>
			<div class="playlist-section">
				<a href="<?= URL ?>?id=3">
					<img src="<?= URL ?>src/images/detente.png" alt="detente">
					<h3>détente</h3>
				</a>
			</div>	
		</div>
	</div>
</div>


</section>
