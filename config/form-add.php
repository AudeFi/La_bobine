<?php

$name='';

if(!empty($_POST['search']))
	{
		$name = strip_tags(trim($_POST['name']));
		$name=urlencode($name); 
		
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/search/movie?api_key=2fb5cd2aa5d0d9868fcd75aba6d96451&query='.$name.'");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  "Accept: application/json"
		));
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		$result = json_decode($response);

		$count = count($result->results);

 		for ($i = 0; $i <= $count - 1; $i++) 
 			{
 				if($i > 6)
 				{
 					 break 1;
 				}

 		  		echo '<pre>';?>

 		  		<form action="" method="POST">
				<a href="index.php?id=<?=$result->results[$i]->id?>"><?php print_r($result->results[$i]->title); ?></a>
				</form>
 		  		<?php echo '</pre>';
			}

			// si l'utilisateur rentre un nom de film qui n'est pas dans la liste, il faudra afficher une erreur
			// gerer l'ensemble en ajax pour plus de confort

	}

	if(!empty($_POST['add'])){

$title= '';
$link = '';


	$title      = strip_tags(trim($_POST['title']));
	$link      = strip_tags(trim($_POST['link']));

	$prepare = $pdo->prepare('INSERT INTO musics (title,link) VALUES (:title,:link)');
	$prepare->bindValue('title',$title);
	$prepare->bindValue('link',$link);

	$execute = $prepare->execute();
}