<?php

define('DB_HOST','localhost');
define('DB_NAME','si-films');
define('DB_USER','root');
<<<<<<< Updated upstream

define('DB_PASS',''); /*Jules*/

/*define('DB_PASS','root');*/
=======
// define('DB_PASS',''); /*Jules*/
define('DB_PASS','root');
>>>>>>> Stashed changes
try
{
    // Try to connect to database
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

    // Set fetch mode to object
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die('Could not connect');
}