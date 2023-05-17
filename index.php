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
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>媒体技术</title>
        <link rel="icon" type="image/png" href="../img/Logo.png">
    </head>
    <body>
        <header>
            <a href="index.html"><img class="logo" width="90" height="90" src="img/Logo.png" alt="Logo"></a>
            <nav>
                <ul>
                    <li><a class="activePage" href="index.html">Startseite</a></li>
                    <li><a href="html/starter.html">Vorspeisen</a></li>
                    <li><a href="html/maincourses.html">Hauptspeise</a></li>
                    <li><a href="html/dessert.html">Desert</a></li>
                </ul>
            </nav>
            <ul class="conf">
                <li><a href="html/config.html">Konfiguration</a></li>
            </ul>
        </header>
    <form>
        <p><input type="text" name="Benutzername" placeholder="Benutzername"></p>
        <p><input type="text" name="Benutzername" placeholder="Passwort"></p>
    </form>
</html>