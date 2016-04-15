<?php

// Tab FOR ERRORS AND SUCCESS
$errors_connexion = array();
$success_connexion = array();
$errors_inscription = array(); 
$success_inscription = array();
$email_connexion = '';
$password_connexion = '';
$email = '';
$pseudo = '';


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
				'pseudo' => $user->pseudo,
				'status' => $user->status
			);

			header('Location: '.URL.'connexion');
			exit;
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
	
		// Check if pseudo already used
		$prepare = $pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
		$prepare->bindValue('pseudo',$pseudo);
		$execute = $prepare->execute();
		$user_pseudo = $prepare->fetch();
		if($user_pseudo){
			$errors_inscription['pseudo'] = 'Pseudo déjà utilisé';
		}
	
		// Check pseudo length
		else if ($pseudolength <= 3) {
			 $errors_inscription['pseudo'] = 'Veuillez renseigner un pseudo à plus de 3 caractères';
		}
		elseif ($pseudolength > 25){
	
			$errors_inscription['pseudo'] = 'Veuillez renseigner un pseudo à moins de 25 caractères';
		}	 
	}

	else {
		$errors_inscription['pseudo'] = 'Veuillez renseigner un pseudo';
	}
	
		// MAIL ERRORS
	
	if (!empty($_POST['email'])){
		$email = securisationbis($_POST['email']);
	
		// Check if email already used
		$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email');
		$prepare->bindValue('email',$email);
		$execute = $prepare->execute();
		$user_email = $prepare->fetch();
		if($user_email){
			$errors_inscription['email'] = 'Email déjà utilisé';
		}
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
	if(empty($errors_inscription)){	

		$prepare = $pdo -> prepare('INSERT INTO users (pseudo, email, password, status, date_inscription, contribution) VALUES (:pseudo, :email, :password, :status, :date_inscription, :contribution)');
		$prepare -> bindValue('pseudo', $pseudo);
		$prepare -> bindValue('email', $email);
		$prepare -> bindValue('password', $password);
		$prepare -> bindValue('status', 'user');
		$prepare -> bindValue('date_inscription', date('Y-m-d'));
		$prepare -> bindValue('contribution', '0');
		$execute = $prepare -> execute();

		if(!$execute){
			$errors_inscription[] = "Erreur lors de l'enregistrement";
		}
		else{
			$success_inscription[] = 'Utilisateur enregistré';
			// Envoi
			// SET VARIABLES AND HASH PASSWORD
			$vosID = 'Merci de votre inscription à la Bobine';
			$message = 'Merci de vous être inscrit sur La Bobine. Vous pouvez désormais contribuer au site en y ajoutant des musiques. Si vous faites preuve de bonne utilisation, vous pourrez peut être même être séléctionné pour modérer les propositions d\'autres utilisateurs. Votre pseudo est '.$pseudo.'. Seul vous connaissez votre mot de passe. L\'équipe La Bobine';
	    	mail($email, $vosID, $message);

			$pseudo  = '';
			$email = '';
		}	
	}
}