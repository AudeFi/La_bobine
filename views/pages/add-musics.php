<?php
	require 'config/form-add.php';
	require 'config/form-movie.php';
?>
<?php 
	if(empty($_SESSION['user'])):
?>
<section>
	<div class="connect-you">
		<p><a href="<?= URL ?>connexion">Connectez-vous</a></p>
		 <p>pour ajouter des musiques</p>
	</div>
</section>

<?php else:?>

<section>
	
<div class="container-add">
	<div class="container-title-add">
		<h3>Ajoutez votre musique</h3>
	</div>
	<div class="container-text-add">
		<p>Votre musique sera écoutée et vérifiée par nos modérateurs.</p>
	</div>

	<div class="container-add-music">
		<form action="#" method="post" class="search" autocomplete="off">
			<div class="film-search">
				<input type="text" name="movie_title" id="movie_title" value="" placeholder="Choisissez le film">
				<div class="results"></div>
				<input type="text" name="movie_name" id="movie_name" value="" placeholder="Titre du film" readonly >
			</div>
			<div class="content-add-music">
				<input type="text" name="movie_id" id="movie_id" value="" class="movie_id">
				<div class="music-title">
					<input type="text" name="music_title" id="music_title" value="<?= $music_title ?>" placeholder="Entrez le titre de la musique">
				</div>
				<div class="composer">
					<input type="text" name="composer" id="composer" value="<?= $composer ?>" placeholder="Entrez un compositeur">
				</div>
				<div class="link">
					<input type="link" name="music_link" id="music_link" value="<?= $music_link ?>" placeholder="Entrez votre lien">
				</div>
				<div class="add-submit">
					<input type="submit" name="add" id="add" value="Soumettre">
				</div>
			</div>	
			<div class="container-php">
				<?php if(!empty($errors)): ?>
					<div class="errors">
						<?php foreach ($errors as $_error): ?> 
							<div><?= $_error ?></div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php if(!empty($success)): ?>
					<div class="success">
						<?php foreach ($success as $_success): ?> 
							<div><?= $_success ?></div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>				
		</form>
	</div>		
</div>

</section>

<?php endif; ?>