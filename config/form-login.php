<?php



// ----------- CONNEXION -------------

	if(!empty($_POST['loginform'])) 
	{
		

		// XSS PROTECTION
	function securisation($donnees){
		$donnees = trim($donnees); 
		$donnees = stripcslashes($donnees);
		$donnees = strip_tags($donnees);
		return ($donnees);
	}

	$email = securisation($_POST['email']);
	$password = securisation(hash('sha256',SALT.$_POST['password']));
	

		$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email');
		$prepare->bindValue('email',$email);
		$execute = $prepare->execute();
		$user = $prepare->fetch();

		if($user){
			if($user->password == $password) {
				$_SESSION['user'] = array(
					'id' => $user->id,
					'email' => $user->email,
					'status' => $user->status
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



// ----------- INSCRIPTION -------------

	if(!empty($_POST['signinform'])) {
		echo "Merci de votre inscription";
		$email = $_POST['email'];
		$password = hash('sha256',SALT.$_POST['password']);

		$prepare = $pdo->prepare('INSERT INTO users (email,password) VALUES (:email,:password)');
		$prepare->bindValue('email',$email);
		$prepare->bindValue('password',$password);
		$execute = $prepare->execute();
	}