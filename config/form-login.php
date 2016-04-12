<?php

// Tableau pour afficher erreurs et succès
$errors_connexion = array();
$success_connexion = array();
$errors_inscription = array(); 
$success_inscription = array();

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

		$email_connexion = securisation($_POST['email_connexion']);
		$password_connexion = securisation(hash('sha256',SALT.$_POST['password_connexion']));
		

		$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email');
		$prepare->bindValue('email',$email_connexion);
		$execute = $prepare->execute();
		$user = $prepare->fetch();

		if($user){
			if($user->password == $password_connexion) {
				$_SESSION['user'] = array(
					'id' => $user->id,
					'email' => $user->email,
					'status' => $user->status
				);
			}
			else {
				$errors_connexion['connexion'] = "Login ou mot de passe incorrect";
			}
		}
		else {
			$errors_connexion['connexion'] = "Login ou mot de passe incorrect";
		}
	}



// ----------- INSCRIPTION -------------

	if(!empty($_POST['subscribe'])) {

	// SET VARIABLES AND HASH PASSWORD
	$vosID =' Vos ID';
	$message = 'Voici vos ID';
	

	// XSS PROTECTION
	function securisationbis($donneesbis){
		$donneesbis = trim($donneesbis); /*SPACE*/
		$donneesbis = stripcslashes($donneesbis);/*SLASH*/
		$donneesbis = strip_tags($donneesbis);/*CODISH*/
		return ($donneesbis);
	}

	/*$code = securisationbis($_POST['code']);*/


	// PSEUDO ERRORS
	if(!empty($_POST['pseudo'])){
		$pseudo = securisationbis($_POST['pseudo']);
		$pseudolength = strlen($pseudo);
		if ($pseudolength <= 3) 
		{
			 $errors_inscription['pseudo'] = 'Veuillez renseigner un pseudo à plus de 3 caractères';
		}
		elseif ($pseudolength > 25)
		{

			$errors_inscription['pseudo'] = 'Veuillez renseigner un pseudo à moins de 25 caractères';
		}	 
	}
	else {
		$errors_inscription['pseudo'] = 'Veuillez renseigner un pseudo';
	}

	// MAIL ERRORS
	
	if (!empty($_POST['email']))
	{
		$email = securisationbis($_POST['email']);
	}
	else {
		$errors_inscription['email'] = 'Veuillez renseigner votre email';
	}



	// PASSWORDS ERRORS
	$password = securisationbis(hash('sha256',SALT.$_POST['password']));
	$password2 = securisationbis(hash('sha256',SALT.$_POST['password2']));
	$passwordlength = strlen($_POST['password']);

	if (empty($_POST['password']))
	{
		$errors_inscription['password'] = 'Veuillez renseigner votre mot de passe';
	}
	else if (empty($_POST['password2'])) {
		$errors_inscription['password2'] = 'Veuillez confirmer votre mot de passe';
	}
	else if ($passwordlength <= 5) 
	{
		$errors_inscription['password'] = 'Veuillez renseigner un mot de passe à plus de 5 caractères';
	}
	// PASSWORDS COMPARE
	else if ($password != $password2)
	{
	    $errors_inscription['password'] = ' Veuillez renseigner le même mot de passe';
	    $errors_inscription['password2'] = '';
	}

	// SUCCESS				
	if(empty($errors_inscription))
	{	
			$prepare = $pdo -> prepare('INSERT INTO users (pseudo, email, password, status) VALUES (:pseudo, :email, :password, :status)');
			$prepare -> bindValue('pseudo', $pseudo);
			$prepare -> bindValue('email', $email);
			$prepare -> bindValue('password', $password);
			$prepare -> bindValue('status', 'user');
			$execute = $prepare -> execute();

			if(!$execute){
				$errors_inscription[] = "Erreur lors de l'enregistrement";
			}
			else
			{
				$success_inscription[] = 'Utilisateur enregistré';

				$name  = '';
				$title = '';
				$price = '';
				// Envoi
	    		mail($email, $vosID, $message);
			}	
	}
}