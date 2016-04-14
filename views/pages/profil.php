<?php
	
	require 'config/add-to-playlist.php';

	$query = $pdo->query('SELECT * FROM validation_musics ORDER BY id DESC');
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

	$query = $pdo->query('SELECT date_inscription FROM users WHERE pseudo="'.$_SESSION['user']['pseudo'].'"');
	$date_inscription = $query->fetch();

	$query = $pdo->query('SELECT * FROM musics WHERE add_by="'.$_SESSION['user']['pseudo'].'"');
	$ajouts = $query->fetchAll();
	$nb_ajouts = count($ajouts);

	$query = $pdo->query('SELECT * FROM validation_musics WHERE add_by="'.$_SESSION['user']['pseudo'].'"');
	$attente = $query->fetchAll();
	$nb_attente = count($attente);

	$query = $pdo->query('SELECT contribution FROM users WHERE pseudo="'.$_SESSION['user']['pseudo'].'"');
	$nb_envoye = $query->fetch();

	
?>

<?php 
	if(empty($_SESSION['user'])):
?>
<!-- Si je ne suis pas connecté -->

<section>
		<p>Connectez-vous pour accéder à cette page</p>
		<a href="<?= URL ?>connexion">-> Connexion ou inscription</a>
	</div>
</section>


<!-- Si je suis connecté -->

<?php else:?>

<section>

<!-- DIV PROFIL -->

	<div class="section profil">
		<h2>Votre profil - <?= $_SESSION['user']['pseudo'] ?></h2>
		<div class="date">Date d'inscription : <?= $date_inscription->date_inscription ?></div>
		<div class="envoye">Nombre de musiques envoyées : <?= $nb_envoye->contribution ?></div>
		<div class="envoye">Nombre de musiques en attente : <?= $nb_attente ?></div>
		<div class="accepte">Nombre de musiques acceptées : <?= $nb_ajouts ?></div>
		<div class="disconnect"><a href="<?= URL ?>disconnect">Déconnexion</a></div>
	</div>
	
	<!-- SI JE SUIS ADMIN -->

	<?php if($_SESSION['user']['status']=='admin'):?>

	<div class="section admin">
		<h2>Approuvez les demandes de musiques</h2>

		<div class="admin-part approbation">
			<div class="scroll">
			 	<?php foreach($validation_musics as $_validation): ?>
			 	<div class="line">
				 	<div class="infos">
				 		<div class="first-line">
				 			<?= $_validation->music_title ?> - <?= $_validation->composer ?> - <?= $_validation->movie_name ?>
				 		</div>
				 		<div class="second-line">
				 			Proposé par <?= $_validation->add_by ?> - <a href="https://www.youtube.com/watch?v=<?= $_validation->music_link ?>" target="_blank" class="youtube_link">Lien youtube</a>
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
			<h2>Ajoutez des musiques aux playlists</h2>
			<form action="#" method="POST">
				<div class="flex">
					<div class="colonne">
						<h4>Sélectionnez une musique</h4>
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
						<h4>Sélectionnez une playlist</h4>
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
			<h2>Voici le contenu des playlists</h2>
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