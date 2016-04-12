<?php
	require 'config/form-add.php';
?>

<section>

	<form action="#" method="post">
	<input type="text" name="name" id="name" value="">
		<div>
 			<input type="submit" name="search" class="click">
 		</div>
	</form>	


	<form action="#" method="post">
		FILM : <input type="text" name="movies" id="movies" value="<?= $name?>">
		NAME : <input type="text" name="title" id="title" value="">
		LINK : <input type="link" name="link" id="link" value="">
		<div>
 			<input type="submit" name="add">
 		</div>
	</form>

</section>