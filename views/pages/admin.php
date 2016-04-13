<?php

	$query = $pdo->query('SELECT * FROM validation_musics');
	$validation_musics = $query->fetchAll(); 

?>

<?php 
	if(empty($_SESSION['user']) || $_SESSION['user']['status']=='user'):
?>
<section>
	Accès non autorisé
</section>

<?php else:?>

<section>


<table>
 		<tr>
 			<th>ID</th>
 			<th>Movie</th>
 			<th>Movie ID</th>
 			<th>Music Title</th>
 			<th>Composer</th>
 			<th>Music Link</th>
 			<th>Validation</th>
 			<th>Erase</th>
 		</tr>
 		<?php foreach($validation_musics as $_validation): ?>
 			<td><?= $_validation->id ?></td>
 			<td><?= $_validation->movie_name ?></td>
 			<td><?= $_validation->movie_id ?></td>
 			<td><?= $_validation->music_title ?></td>
 			<td><?= $_validation->composer ?></td>
 			<td><?= $_validation->music_link ?></td>
 			<td>
 				<form class="trash" action="config/validation.php?id=<?= $_validation->id; ?>" method="POST">
 					<button class="erase" type="submit" value="VALIDE">
 					</button>
 				</form>
 			</td>
 			<td>
 				<form class="trash" action="config/delete.php?id=<?= $_validation->id; ?>" method="POST">
 					<button class="erase" type="submit" value="REMOVE">
 					</button>
 				</form>
 			</td>
 		</tr>
 		<?php endforeach; ?>
 	</table>



</section>

<?php endif; ?>