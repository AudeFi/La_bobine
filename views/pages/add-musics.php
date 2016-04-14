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
		<p>Vous recevrez une notification dès que votre musique sera validée.</p>
	</div>

	<div class="container-add-music">
		<form action="#" method="post" class="search" autocomplete="off">
			<div class="film-search">
				<input type="text" name="movie_title" id="movie_title" value="" placeholder="Choisissez le film">
				<div class="results"></div>
				<input type="text" name="movie_name" id="movie_name" value="" placeholder="Titre du film" readonly >
			</div>
			<div class="content-add-music">
			<!-- <input type="text" name="movie_id" id="movie_id" value="" class="movie_id"> -->
				<div class="music-title">
					<input type="text" name="music_title" id="music_title" value="" placeholder="Entrez le titre de la musique">
				</div>
				<div class="composer">
					<input type="text" name="composer" id="composer" value="" placeholder="Entrez un compositeur">
				</div>
				<div class="link">
					<input type="link" name="music_link" id="music_link" value="" placeholder="Entrez votre lien">
				</div>
				<div class="add-submit">
					<input type="submit" name="add" id="add" value="Soumettre">
				</div>
			</div>					
		</form>
	</div>		

	<!-- <div class="container-img-add">
		<img src="<?= URL ?>src/images/gendarmes.png" alt="gendarmes">
	</div> -->
</div>

</section>

<?php endif; ?>