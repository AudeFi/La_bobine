<?php
	require 'config/form-add-2.php';
?>

	<form action="#" method="post">
		FILM : <input type="text" name="movie" id="movie" value="<?= $name?>">
		NAME : <input type="text" name="title" id="title" value="">
		LINK : <input type="link" name="link" id="link" value="">
		<div>
 			<input type="submit" name="add">
 		</div>
	</form>