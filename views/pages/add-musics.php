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
	<form action="#" method="post">
	<input type="text" name="name" id="name" value="">
		<div>
 			<input class="color" type="submit" name="search" class="click">
 		</div>
	</form>	


	<form action="#" method="post">
		<div class="">
			<label for="movies">Le nom du film</label></br>
			<input class="border" type="text" name="movies" id="movies" value="<?= $name?>">		
		</div>
		<div class="">
			<label for="title">Le nom de la musique</label></br>
			<input class="border" type="text" name="title" id="title" value="">		
		</div>
		<div class="">
			<label for="link">Le lien YOUTUBE</label></br>
			<input class="border" type="link" name="link" id="link" value="">		
		</div>
		<!-- <div class="">
			<label for="composer">Le compositeur</label></br>
			<input type="text" name="composer" id="composer" value="<?= $composer?>">		
		</div> -->
		<div>
 			<input class="color" type="submit" name="add">
 		</div>
	</form>
	<div class="container-img-add">
		<img src="<?= URL ?>src/images/gendarmes.png" alt="gendarmes">
	</div>
</div>

	

</section>

<?php endif; ?>