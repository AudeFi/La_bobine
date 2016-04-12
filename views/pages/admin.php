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
 			<th>Movies</th>
 			<th>Title</th>
 			<th>Composer</th>
 			<th>Link</th>
 			<th>Validation</th>
 			<th>Erase</th>
 		</tr>
 		<?php foreach($validation_musics as $_validation): ?>
 			<td><?= $_validation->id ?></td>
 			<td><?= $_validation->movies ?></td>
 			<td><?= $_validation->title ?></td>
 			<td><?= $_validation->composer ?></td>
 			<td><?= $_validation->link ?></td>
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