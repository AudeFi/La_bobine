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

	if(!empty($_POST)) {

	// SET VARIABLES AND HASH MDP
	$pseudo = $email = $code = "";
	$vosID =' Vos ID';
	$message = 'Voici vos ID';
	

	// XSS PROTECTION
	function securisationbis($donneesbis){
		$donneesbis = trim($donneesbis); /*SPACE*/
		$donneesbis = stripcslashes($donneesbis);/*SLASH*/
		$donneesbis = strip_tags($donneesbis);/*CODISH*/
		return ($donneesbis);
	}

	$pseudo = securisationbis($_POST['pseudo']);
	$email = securisationbis($_POST['email']);
	$password = securisationbis(hash('sha256',SALT.$_POST['password']));
	$password2 = securisationbis(hash('sha256',SALT.$_POST['password']));
	/*$code = securisationbis($_POST['code']);*/



	// PSEUDO ERRORS
	$pseudolength = strlen($pseudo);
	if ($pseudolength <=3) 
	{
		 $errors['pseudo'] = 'Veuillez renseigner un pseudo à plus de 3 caractères';
	}
	elseif ($pseudolength >100)
	{

		$errors['pseudo'] = 'Veuillez renseigner un pseudo à moins de 100 caractères';
	}	 

	// MAIL ERRORS

	if (filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		
	}
	elseif ( empty ($_POST['mail']))
	{
		$errors['email'] = 'Veuillez renseigner votre email';
	}
	else
	{
		$errors['email'] = 'Veuillez renseigner un email valide';
	}	

	// MDP ERRORS
	$passwordlength = strlen($password);
	if ( empty ($_POST['password']) AND empty ($_POST['password2']))
	{
		$errors['password'] = 'Veuillez renseigner votre mot de passe';
		$errors['password2'] = 'Veuillez confirmer votre mot de passe';
	}
	elseif ($passwordlength <=5) 
	{
		 $errors['password'] = 'Veuillez renseigner un mot de passe à plus de 5 caractères';
		 $errors['password2'] = '';
	}
	elseif ( empty ($_POST['password']) OR empty ($_POST['password2']))
	{
		$errors['password'] = 'Veuillez renseigner votre mot de passe';
		$errors['password2'] = 'Veuillez confirmer votre mot de passe';
	}
	
	// MDP COMPARE ERRORS
	if ( isset ($_POST['password']) AND isset ($_POST['password2']))
    {
	       if ($password != $password2)
	        {
	            $errors['password'] = ' Veuillez renseigner le même mot de passe';
	            $errors['password2'] = '';
	        }
       
    }

	// CAPCHAT ==> SPAM PROTECTION // ERRORS MANAGE
    if ( isset ($_POST['code_entre']) AND isset ($_POST['code']))
    {
        $code_entre = $_POST['code_entre'];
        $code = $_POST['code'];
        $code = $code / '368.5';
        if ($code_entre == NULL)
        {
           $errors['code_entre'] = 'Veuillez renseigner le code';
        }
        elseif ($code_entre != $code)
        {
            $errors['code_entre'] = ' Attention, mauvais code.';
        }
       
    }
	// SUCCES				
	if(empty($errors))
	{	
			$success[] = 'Utilisateur enregistré';
			$prepare = $pdo -> prepare('INSERT INTO users (pseudo, email, password, /*user*/) VALUES (:pseudo, :email, :password /*,:user*/)');
			$prepare -> bindValue('pseudo', $pseudo);
			$prepare -> bindValue('email', $email);
			$prepare -> bindValue('mdp', $password);
			/*$prepare -> bindValue('user', $user);*/
			$execute = $prepare -> execute();
			
	     // Envoi
	     mail($email, $vosID, $message);

	}
}