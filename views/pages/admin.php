<?php

	$query = $pdo->query('SELECT * FROM validation_musics');
	$validation_musics = $query->fetchAll(); 

	$query = $pdo->query('SELECT * FROM playlists');
	$all_playlists = $query->fetchAll(); 

	$query = $pdo->query('SELECT * FROM musics');
	$all_musics = $query->fetchAll(); 

	$query = $pdo->query('SELECT * FROM playlists_has_musics INNER JOIN playlists ON playlists_has_musics.id_playlists = playlists.id INNER JOIN musics ON playlists_has_musics.id_musics = musics.id WHERE playlists.id = 1');
	$playlist1 = $query->fetchAll();

	$query = $pdo->query('SELECT * FROM playlists_has_musics INNER JOIN playlists ON playlists_has_musics.id_playlists = playlists.id INNER JOIN musics ON playlists_has_musics.id_musics = musics.id WHERE playlists.id = 2');
	$playlist2 = $query->fetchAll();

	$query = $pdo->query('SELECT * FROM playlists_has_musics INNER JOIN playlists ON playlists_has_musics.id_playlists = playlists.id INNER JOIN musics ON playlists_has_musics.id_musics = musics.id WHERE playlists.id = 3');
	$playlist3 = $query->fetchAll();

	echo '<pre>';
	print_r($playlist1);
	echo '</pre>';
	
?>

<?php 
	if(empty($_SESSION['user']) || $_SESSION['user']['status']=='user'):
?>
<section>
	Accès non autorisé
</section>

<?php else:?>

<section>


<table>
 		<tr>
 			<th>ID</th>
 			<th>Movie</th>
 			<th>Movie ID</th>
 			<th>Music Title</th>
 			<th>Composer</th>
 			<th>Music Link</th>
 			<th>Validation</th>
 			<th>Erase</th>
 		</tr>
 		<?php foreach($validation_musics as $_validation): ?>
 			<td><?= $_validation->id ?></td>
 			<td><?= $_validation->movie_name ?></td>
 			<td><?= $_validation->movie_id ?></td>
 			<td><?= $_validation->music_title ?></td>
 			<td><?= $_validation->composer ?></td>
 			<td><?= $_validation->music_link ?></td>
 			<td>
 				<form class="check" action="config/validation.php?id=<?= $_validation->id; ?>" method="POST">
 					<button class="validate" type="submit" value="VALIDE" name="validate">
 					</button>
 				</form>
 			</td>
 			<td>
 				<form class="trash" action="config/delete.php?id=<?= $_validation->id; ?>" method="POST">
 					<button class="erase" type="submit" value="REMOVE" name="erase">
 					</button>
 				</form>
 			</td>
 		</tr>
 		<?php endforeach; ?>
 	</table>


<div class="add-playlists">
	<h3>Ajoutez des musiques aux playlists</h3>
	<form action="config/add-to-playlist.php" method="POST">
		<div>
			<h4>Selectionnez une playlist</h4>
			<?php foreach($all_playlists as $one_playlist): ?>
				<label for="name_playlist"><?= $one_playlist->name ?></label>
				<input class="border" type="radio" value="<?= $one_playlist->id ?>" name="name_playlist" id="name_playlist">
			<?php endforeach; ?>
		</div>
		<div>
			<h4>Selectionnez des musiques</h4>
			<?php foreach($all_musics as $one_music): ?>
				<label for="name_music"><?= $one_music->music_title ?> par <?= $one_music->composer ?></label>
				<input class="border" type="checkbox" value="<?= $one_music->id ?>" name="name_music" id="name_music">
			<?php endforeach; ?>
		</div>
	</form>
</div>




<div class="list-playlists">
	<h3>Voici le contenu des playlists</h3>
	<div class="classiques">	
		<h4>Les classiques</h4>
		<ul>
			<?php foreach($playlist1 as $content_playlist): ?>
				<li><?= $content_playlist->movie_name ?></li>
				<form class="delete_from_playlist" action="config/delete-from-playlist.php?id=<?= $content_playlist->id ?>&playlist=1" method="POST">
 					<button class="delete" type="submit" value="VALIDE" name="playlist1">
 					</button>
 				</form>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="classiques">	
		<h4>Bonne humeur</h4>
		<ul>
			<?php foreach($playlist2 as $content_playlist): ?>
				<li><?= $content_playlist->movie_name ?></li>
				<form class="delete_from_playlist" action="config/delete-from-playlist.php?id=<?= $content_playlist->id ?>&playlist=2" method="POST">
 					<button class="delete" type="submit" value="VALIDE" name="playlist2">
 					</button>
 				</form>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="classiques">	
		<h4>Détente</h4>
		<ul>
			<?php foreach($playlist3 as $content_playlist): ?>
				<li><?= $content_playlist->movie_name ?></li>
				<form class="delete_from_playlist" action="config/delete-from-playlist.php?id=<?= $content_playlist->id ?>&playlist=3" method="POST">
 					<button class="delete" type="submit" value="VALIDE" name="playlist3">
 					</button>
 				</form>
			<?php endforeach; ?>
		</ul>
	</div>
	
</div>


</section>

<?php endif; ?>