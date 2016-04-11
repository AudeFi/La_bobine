<?php

	require 'config/form-login.php';

	if(!empty($_POST['loginform'])) 
	{
		$email = $_POST['email'];
		$password = hash('sha256',SALT.$_POST['password']);

		$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email');
		$prepare->bindValue('email',$email);
		$execute = $prepare->execute();
		$user = $prepare->fetch();

		if($user){
			if($user->password == $password) {
				$_SESSION['user'] = array(
					'id' => $user->id,
					'email' => $user->email
				);
			}
			else {
				echo "Nop";
			}
		}
		else {
			echo "Login ou mot de passe incorrect";
		}
	}


	if(!empty($_POST['signinform'])) {
		echo "Merci de votre inscription";
		$email = $_POST['email'];
		$password = hash('sha256',SALT.$_POST['password']);

		$prepare = $pdo->prepare('INSERT INTO users (email,password) VALUES (:email,:password)');
		$prepare->bindValue('email',$email);
		$prepare->bindValue('password',$password);
		$execute = $prepare->execute();
	}

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