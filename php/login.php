<?php
define('MYSQL_HOST', '38.242.141.75');
define('MYSQL_BENUTZER', '');
define('MYSQL_KENNWORT', '');
define('MYSQL_DATENBANK', 'accounts');

$dsn = "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE;

try {
    $db = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
} catch (PDOException $e) {
    
}
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="navbar">
            <a href="#news" class="first">News</a>
            <div class="dropdown">
                <button class="dropbtn">Find Work 
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#Video&Audio">Video & Audio</a>
                    <a href="#Marketing">Marketing</a>
                    <a href="#ITDeveloper">IT Developer</a>
                    <a href="#Network">Network</a>
                    <a href="#CopyWriter">Copy Writer</a>
                    <a href="#WebDesigner">Web Designer</a>
                </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Top Worker 
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="#Video&Audio">Video & Audio</a>
                    <a href="#Marketing">Marketing</a>
                    <a href="#ITDeveloper">IT Developer</a>
                    <a href="#Coach">Coach</a>
                    <a href="#WebDesigner">Web Designer</a>
              </div>
            </div>
            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                  <button type="submit" class="last">Submit</i></button>
                </form>
            </div>
        </div>
        <div class="navbartwo">
            <p class="firsttwo">Categories |</p>
            <a href="#VideoEditing">Video Editing</a>
            <a href="#Marketing">Marketing</a>
            <a href="#Development&IT">Development & IT</a>
            <a href="#Coaching">Coaching</a>
            <a href="#WebDesign">Web Design</a>
        </div>

        <form action="login.php">
            <input type="email" name="E-Mail" id="email" placeholder="E-Mail" required>
            <input type="password" name="password" id="password" placeholder="Passwort" required>
            <input type="submit" value="Anmelden">
        </form>
</html>

<?php



?>
