<?php
try
{
$db = new PDO('mysql:host=wordpressdb-x.hosting.stackcp.net;dbname=SCWORDPRESS-32313622ed', 'SCWORDPRESS-32313622ed', 'f25126576b21',
               array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//mysqli_set_charset($conn,"utf8mb4");
    
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}

// /** The name of the database for WordPress */
// define('DB_NAME', 'SCWORDPRESS-32313622ed');

// /** MySQL database username */
// define('DB_USER', 'SCWORDPRESS-32313622ed');

// /** MySQL database password */
// define('DB_PASSWORD', 'f25126576b21');

// /** MySQL hostname */
// define('DB_HOST', 'wordpressdb-x.hosting.stackcp.net');


?>