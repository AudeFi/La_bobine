<?php

include 'config/options.php';
include 'config/database.php';

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];

// Routes
if($q == '')
	$page = 'home';
else if($q == 'playlists')
	$page = 'playlists';
else if($q == 'add-musics')
	$page = 'add-musics';
else if($q == 'connexion')
	$page = 'connexion';
else if($q == 'admin')
	$page = 'admin';
else if($q == 'disconnect')
	$page = 'disconnect';
else if($q == 'legal')
	$page = 'legal';
else
	$page = '404';

// Includes
include 'controllers/'.$page.'.php';
include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';