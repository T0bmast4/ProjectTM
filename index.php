<?php
$dsn = "mysql:host=localhost;dbname=accounts";
$mysql_username = "root";
$mysql_password = "";

try {
    $db = new PDO($dsn, $mysql_username, $mysql_password);
} catch (PDOException $e) {
    
}
?>
<html>
    <form>
        <p><input type="text" name="Benutzername" placeholder="Benutzername"></p>
    </form>
</html>