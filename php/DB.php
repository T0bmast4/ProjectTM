<?php
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "");
define("MYSQL_DATABASE", "projekt");

$dsn = "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE;

try {
    $db = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
} catch (PDOException $e) {
    
}
?>