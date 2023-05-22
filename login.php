<?php
define('MYSQL_HOST', '38.242.141.75');
define('MYSQL_USER', 'USERNAME');
define('MYSQL_PASSWORD', 'PASSWORD');
define('MYSQL_DATENBANK', 'accounts');

$dsn = "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATENBANK;

try {
    $db = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
} catch (PDOException $e) {
    
}
?>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <form>
        <input type="text" name="Benutzername" placeholder="Benutzername">
        <br>
        <input type="text" name="Passwort" placeholder="Passwort">
    </form>
</html>