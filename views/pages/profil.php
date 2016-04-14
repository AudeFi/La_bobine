<?php
	
	require 'config/add-to-playlist.php';

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
	
?>

<?php 
	if(empty($_SESSION['user'])):
?>
<section>

	Accès non autorisé

</section>


<!-- Si je suis connecté -->
<?php else:?>

<section>

<!-- DIV PROFIL -->

	<div class="section profil">
		<h2>Votre profil</h2>
		<div class="date">Date d'inscription</div>
		<div class="envoye">Nombre de musiques envoyés</div>
		<div class="accepte">Nombre de musiques acceptés</div>	
	</div>




	<!-- SI JE SUIS ADMIN -->
	<?php if($_SESSION['user']['status']=='admin'):?>

	<div class="section admin">
		<h2>Admin - Gestion</h2>


		<div class="admin-part approbation">
			<h3>Approuvez les demandes de musiques</h3>
			<div class="scroll">
			 	<?php foreach($validation_musics as $_validation): ?>
			 	<div class="line">
				 	<div class="infos">
				 		<div class="first-line">
				 			<div class="titles"><?= $_validation->music_title ?> - <?= $_validation->composer ?></div>
				 			<div class="link"><?= $_validation->music_link ?></div>
				 		</div>
				 		<div class="second-line">
				 			<div class="backline"><?= $_validation->movie_name ?></div>
						</div>	
					</div>
					<div class="buttons">
							<form class="check" action="config/validation.php?id=<?= $_validation->id; ?>" method="POST">
				 				<button class="validate" type="submit" value="VALIDE" name="validate">ACCEPTER</button>
				 			</form>
				 			<form class="trash" action="config/delete.php?id=<?= $_validation->id; ?>" method="POST">
				 				<button class="erase" type="submit" value="REMOVE" name="erase">REFUSER</button>
				 			</form>
				 	</div>
			 	</div>
			 	<?php endforeach; ?>
			</div>
		</div>



		<div class="admin-part add-playlists">
			<h3>Ajoutez des musiques aux playlists</h3>
			<form action="#" method="POST">
				<div class="flex">
					<div class="colonne">
						<h4>Selectionnez des musiques</h4>
						<div class="scroll">
							<?php foreach($all_musics as $one_music): ?>
							<div class="input-label">
								<input class="border" type="checkbox" value="<?= $one_music->id ?>" name="name_music[]" id="name_music<?= $one_music->id ?>">
								<label for="name_music<?= $one_music->id ?>"><?= $one_music->music_title ?> par <?= $one_music->composer ?></label>								
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="colonne">
						<h4>Selectionnez une playlist</h4>
						<div class="scroll">
							<?php foreach($all_playlists as $one_playlist): ?>
							<div class="input-label">
								<input class="border" type="radio" value="<?= $one_playlist->id ?>" name="name_playlist" id="name_playlist<?=$one_playlist->id?>">
								<label for="name_playlist<?=$one_playlist->id?>"><?= $one_playlist->name ?></label>								
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="colonne colonne-submit">
						<input type="submit" name="add-to-playlist">
					</div>
				</div>
			</form>
		</div>
		




		<div class="admin-part list-playlists">
			<h3>Voici le contenu des playlists</h3>
			<div class="flex">
				<div class="colonne classiques">	
					<h4>Les classiques</h4>
					<div class="scroll">
						<?php foreach($playlist1 as $content_playlist): ?>
							<div class="input-label">
								<form class="delete_from_playlist" action="config/delete-from-playlist.php?id=<?= $content_playlist->id ?>&playlist=1" method="POST">
				 					<button class="delete" type="submit" value="VALIDE" name="playlist1">X</button>
				 				</form>
				 				<span><?= $content_playlist->movie_name ?></span>
				 			</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="colonne bonne-humeur">	
					<h4>Bonne humeur</h4>
					<div class="scroll">
						<?php foreach($playlist2 as $content_playlist): ?>
							<div class="input-label">
								<form class="delete_from_playlist" action="config/delete-from-playlist.php?id=<?= $content_playlist->id ?>&playlist=2" method="POST">
				 					<button class="delete" type="submit" value="VALIDE" name="playlist2">X</button>
				 				</form>
				 				<span><?= $content_playlist->movie_name ?></span>
				 			</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="colonne detente">	
					<h4>Détente</h4>
					<div class="scroll">
						<?php foreach($playlist3 as $content_playlist): ?>
							<div class="input-label">
								<form class="delete_from_playlist" action="config/delete-from-playlist.php?id=<?= $content_playlist->id ?>&playlist=3" method="POST">
				 					<button class="delete" type="submit" value="VALIDE" name="playlist3">X</button>
				 				</form>
				 				<span><?= $content_playlist->movie_name ?></span>
				 			</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			
		</div>

	</div>
	<?php endif; ?>

</section>

<?php endif; ?>