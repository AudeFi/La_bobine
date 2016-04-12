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
		<div class="email <?= array_key_exists('connexion',$errors_connexion) ? 'error' : ''?>">
			<label for="email_connexion">Votre email</label></br>
			<input type="email" value="<?= $email_connexion?>" name="email_connexion" placeholder="Email" id="email_connexion">
		</div>
		<div class="password <?= array_key_exists('connexion',$errors_connexion) ? 'error' : ''?>">
			<label for="password_connexion">Votre mot de passe</label></br>
			<input type="password" name="password_connexion" placeholder="Password" id="password_connexion">
		</div>
		<div>
			<input type="submit" name="loginform">
		</div>
		
		<div class="container-php">
			<?php if(!empty($errors_connexion)): ?>
				<div class="errors">
					<?php foreach ($errors_connexion as $_error): ?> 
						<div><?= $_error ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

	</form>

<?php endif; ?>





	<h2>Ou inscrivez-vous</h2>

	<form action="#" method="POST">
		<div class="pseudo <?= array_key_exists('pseudo',$errors_inscription) ? 'error' : ''?>">
			<label for="pseudo">Votre pseudo</label></br>
			<input id="pseudo" value="<?= $pseudo ?>" type="text" name="pseudo" placeholder="Entrez votre pseudo">
		</div>
		<div class="email <?= array_key_exists('email',$errors_inscription) ? 'error' : ''?>">
			<label for="email">Votre email</label></br>
			<input id="email" value="<?= $email ?>" type="email" name="email" placeholder="Entrez votre email">
		</div>
		<div class="password <?= array_key_exists('password',$errors_inscription) ? 'error' : ''?>">
			<label for="password">Votre mot de passe</label></br>
			<input id="password" type="password" name="password" placeholder="Entrez votre mdp">
		</div>
		<div class="password2 <?= array_key_exists('password2',$errors_inscription) ? 'error' : ''?>">
			<label for="password2">Votre mot de passe</label></br>
			<input id="password2" type="password" name="password2" placeholder="Confirmez votre mdp">
		</div>
		<div>
			<input type="submit" name="subscribe">
		</div>

		<div class="container-php">
			<?php if(!empty($errors_inscription)): ?>
				<div class="errors">
					<?php foreach ($errors_inscription as $_error): ?> 
						<div><?= $_error ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php if(!empty($success_inscription)): ?>
				<div class="success">
					<?php foreach ($success_inscription as $_success): ?> 
						<div><?= $_success ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		
		

	</form>
</section>