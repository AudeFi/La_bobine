<?php
	require 'config/form-add.php';
	require 'config/form-movie.php';
?>
<?php 
	if(empty($_SESSION['user'])):
?>
<section>
	Connectez-vous pour ajouter des musiques
</section>

<?php else:?>

<section>
	
<div class="container-add">
	<div class="container-title-add">
		<h3>Ajoutez votre musique</h3>
	</div>
	<div class="container-text-add">
		<p>Votre musique sera écoutée et vérifiée par nos modérateurs.</p>
		<p>Vous recevrez une notification si l'ajout sur notre site a été effectué.</p>
	</div>

		<form action="#" method="post" class="search">
			FILM : <input type="text" name="movie_title" id="movie_title" value="">
			<div class="results">
			</div>	
			<div>
				ID :<input type="text" name="movie_id" id="movie_id" value="">
				FILM SELECTED : <input type="text" name="movie_name" id="movie_name" value="">
				TITLE : <input type="text" name="music_title" id="music_title" value="">
				COMPOSER : <input type="text" name="composer" id="composer" value="">
				LINK : <input type="link" name="music_link" id="music_link" value="">
				<div>
	 				<input type="submit" name="add" class="add">
	 			</div>
 			</div>
		</form>	

	<div class="container-img-add">
		<img src="<?= URL ?>src/images/gendarmes.png" alt="gendarmes">
	</div>
</div>

</section>

<?php endif; ?>