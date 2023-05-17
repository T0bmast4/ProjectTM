<?php
$dsn = "mysql:host=38.242.141.75;dbname=accounts";

$mysql_username = "USERNAME";
$mysql_password = "PASSWORD";

try {
    $db = new PDO($dsn, $mysql_username, $mysql_password);
} catch (PDOException $e) {
    
}
?>