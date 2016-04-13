<?php
	if (isset($_SESSION)){
		session_destroy();
	}
	header('Location:' . URL .'connexion');
	//header('Location:'.URL.'index.php');
	//header('Location: ../../index.php');
	exit();
?>

<script>
	window.location.href= '../../index.php';
</script>

	