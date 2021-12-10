<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'autoPartsUser');
define('DB_PASS', 'U3iuvuhDmo0tlS5p');
define('DB_NAME', 'autopart');
/*define('DB_CHAR', 'utf8');*/

try{
    $connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
}catch (PDOException $e)
{
    echo("Error: " . $e->getMessage());
}
?>