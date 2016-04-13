<?php

$name = '';

if(!empty($_POST['name']))
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

	$response = '';
	$response = array();

	$movies = array_slice($result->results, 0, 6);

	foreach($movies as $_movie)
	{
		$_response        = new stdClass();
		$_response->title = $_movie->title;
		$_response->id    = $_movie->id;
		$response[] = $_response;
	}

	die(json_encode($response));
}
