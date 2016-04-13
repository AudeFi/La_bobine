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

</section>

<?php endif; ?>