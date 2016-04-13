<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title><?= $title ?></title>
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= URL ?>src/css/reset.css">
	<link rel="stylesheet" href="<?= URL ?>src/css/style.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body class="page-<?= $class ?>">

	<div class="container-global">
			<nav>
				<div class="menu">
					<div class="menu-section menu-logo">
						<img src="<?= URL ?>src/images/logo.svg" alt="logo">
					</div>
					<div class="menu-section menu-content">
						<ul>
							<li><a href="<?= URL ?>">parcourir</a></li>
							<li><a href="<?= URL ?>playlists">playlists</a></li>
							<li><a href="<?= URL ?>add-musics">ajoutez votre musique</a></li>
							<a href="<?= URL ?>connexion"><li>connexion</li></a>
						</ul>
					</div>
					<div class="menu-section menu-social">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</nav>
