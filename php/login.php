<?php
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DATABASE', 'accounts');

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
            <a href="index.html" class="first">Home</a>
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
            <a href="login.php" class="laston">Log In</a>
        </div>
        <div class="navbartwo">
            <p class="firsttwo">Categories |</p>
            <a href="#VideoEditing">Video Editing</a>
            <a href="#Marketing">Marketing</a>
            <a href="#Development&IT">Development & IT</a>
            <a href="#Coaching">Coaching</a>
            <a href="#WebDesign">Web Design</a>
        </div>

        <div class="loginWindow">
            <form action="login.php">
                <input type="email" name="E-Mail" class="textfield" placeholder="E-Mail" required>
                <br>
                <br>
                <input type="password" name="password" id="password" class="textfield" placeholder="Passwort" required>
                <br>
                <br>
                <input type="button" value="Anmelden" class="loginButton">
            </form>
            <a href="register.php" class="registerLink">Noch nicht registriert?</a>
        </div>
</html>

<?php



?>
