<?php
$dsn = "mysql:host=38.242.141.75;dbname=accounts";

$mysql_username = "USERNAME";
$mysql_password = "PASSWORD";

try {
    $db = new PDO($dsn, $mysql_username, $mysql_password);
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
        <input type="text" name="Benutzername" placeholder="Passwort">
    </form>
</html>