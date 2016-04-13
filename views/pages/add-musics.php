<?php
	require 'config/form-add.php';
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
		<p>Votre musique sera écoutée et vérififée par nos modérateurs.</p>
		<p>Vous recevrez une notification si l'ajout sur notre site a était effectué.</p>
	</div>

		<form action="#" method="post" class="search">
			<input type="text" name="movie_title" id="movie_title" value="">
			<div class="results">
			</div>	
			<div>
				FILM : <input type="text" name="movies" id="movie_id" value="<?= $name?>">
				NAME : <input type="text" name="title" id="music_title" value="">
				LINK : <input type="link" name="link" id="music_link" value="">
				<div>
	 				<input type="submit" name="add">
	 			</div>
 			</div>
		</form>	

	<div class="container-img-add">
		<img src="<?= URL ?>src/images/gendarmes.png" alt="gendarmes">
	</div>
</div>

</section>

<?php endif; ?>