<?php

	require 'config/form-login.php';

?>




<section>


<?php 
	if(!empty($_SESSION['user'])): 
?>
	<a href="<?= URL ?>disconnect">Se déconnecter</a>
	<div>Bonjour <?= $_SESSION['user']['email']; ?></div>
<?php else:?>
	<h2>Connectez-vous</h2>
	<form action="#" method="POST">
		<div>
			<input type="email" name="email" placeholder="Email">
		</div>
		<div>
			<input type="password" name="password" placeholder="Password">
		</div>
		<div>
			<input type="submit" name="loginform">
		</div>
	</form>

<?php endif; ?>





	<h2>Ou inscrivez-vous</h2>

		<form action="#" method="POST">
			<div>
				<input type="email" name="email" placeholder="Email">
			</div>
			<div>
				<input type="password" name="password" placeholder="Password">
			</div>
			<div>
				<input type="submit" name="signinform">
			</div>
		</form>
</section>