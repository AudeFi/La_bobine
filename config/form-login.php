<?php

	$errors  = array();
	$success = array();
	$name    = '';
	$title     = '';
	$price  = '';

	// Data send
	if(!empty($_POST['addform']))
	{

		//Set variables
		$name  = trim($_POST['name']);
		$title = trim($_POST['title']);
		$price = trim($_POST['price']);

		//Name errors
		if(empty($name))
			$errors['name'] = 'Indiquez un nom';

		//Title errors
		if(empty($title))
			$errors['title'] = 'Indiquez un titre de dépense';

		//Price errors
		if(empty($price))
			$errors['price'] = 'Indiquez un prix';
		else if($price < 0)
			$errors['price'] = 'Indiquez une dépense supérieure à 0€';


		//Success
		if(empty($errors))
		{
			$prepare = $pdo->prepare('INSERT INTO expenses (name,title,price) VALUES (:name,:title,:price)');
			$prepare->bindValue('name',$name);
			$prepare->bindValue('title',$title);
			$prepare->bindValue('price',$price);

			$execute = $prepare->execute();

			if(!$execute)
			{
				$errors[] = "Une erreur s'est produite lors de la sauvegarde";
			}
			else
			{
				$success[] = 'Dépense ajoutée';

				$name  = '';
				$title = '';
				$price = '';
			}			
		}

	}
