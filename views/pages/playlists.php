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
		<h3>Sélectionnez votre playlist</h3>
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
					<h3>Bonne humeur</h3>
				</a>
			</div>
			<div class="playlist-section">
				<a href="<?= URL ?>?id=3">
					<img src="<?= URL ?>src/images/detente.png" alt="detente">
					<h3>Détente</h3>
				</a>
			</div>	
		</div>
	</div>
</div>

<!-- 
<h2>BDD</h2>

		<table>
			<tr>
				<th>ID_Music</th>
				<th>Nom Film</th>
				<th>Titre Musique</th>
				<th>Compositeur</th>
				<th>URL</th>
				<th>ID_Playlist</th>			
				<th>Nom Playlist</th>
				<th>Description Playlist</th>
			</tr>
			<?php foreach($playlists_has_musics as $_element): ?>
			<tr>
				<td><?= $_element->id_musics ?></th>
				<td><?= $_element->movie ?></th>
				<td><?= $_element->title ?></th>
				<td><?= $_element->composer ?></th>
				<td><?= $_element->link ?></th>
				<td><?= $_element->id_playlists ?></th>
				<td><?= $_element->name ?></th>
				<td><?= $_element->description ?></th>
			</tr>
			<?php endforeach; ?>
		</table>


	<h2>Playlists</h2>
			<h3><?= $playlist1[1]->name ?></h3>
			<table>
				<tr>
					<th>ID_Music</th>
					<th>Nom Film</th>
					<th>Titre Musique</th>
					<th>Compositeur</th>
					<th>URL</th>
				</tr>
				<?php foreach($playlist1 as $_music):?>
				<tr>
					<td><?= $_music->id_musics ?></th>
					<td><?= $_music->movie ?></th>
					<td><?= $_music->title ?></th>
					<td><?= $_music->composer ?></th>
					<td><?= $_music->link ?></th>
				</tr>
				<?php endforeach; ?>
			</table>
			<h3><?= $playlist2[1]->name ?></h3>
			<table>
				<tr>
					<th>ID_Music</th>
					<th>Nom Film</th>
					<th>Titre Musique</th>
					<th>Compositeur</th>
					<th>URL</th>
				</tr>
				<?php foreach($playlist2 as $_music):?>
				<tr>
					<td><?= $_music->id_musics ?></th>
					<td><?= $_music->movie ?></th>
					<td><?= $_music->title ?></th>
					<td><?= $_music->composer ?></th>
					<td><?= $_music->link ?></th>
				</tr>
				<?php endforeach; ?>
			</table>
 -->



</section>
