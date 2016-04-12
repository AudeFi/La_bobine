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
			<label for="pseudo">Votre pseudo</label></br>
			<input type="text" name="pseudo" placeholder="Entrez votre pseudo">
		</div>
		<div>
			<label for="email">Votre email</label></br>
			<input type="email" name="email" placeholder="Entrez votre email">
		</div>
		<div>
			<label for="password">Votre mot de passe</label></br>
			<input type="password" name="password" placeholder="Entrez votre mdp">
		</div>
		<div>
			<label for="password2">Votre mot de passe</label></br>
			<input type="password" name="password2" placeholder="Confirmez votre mdp">
		</div>
		<div>
			<?php
				require '/config/capchat/capchat.php';
			?>
		</div>
		
		

	</form>
</section>