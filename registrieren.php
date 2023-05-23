<!DOCTYPE html>
<html>
    <head>
        <title>SmartShift</title>
        <link rel="shortcut icon" type="image/x-icon" href="smart.ico" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <ul>
            <img src="smart-removebg-preview.png" class="smart" >
            <h2 class="left">SmartShift</h2>
            <li><a href="downloads.html">Downloads</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
            <li><a  href="index.php">Home</a></li>
        </ul>
        <div class="site2">
            <form action="index.php" method="post">
                <form action="">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="vorname" placeholder="Your name..">
                
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="nachname" placeholder="Your last name..">
                    
                    <label for="fname">E-Mail</label>
                    <input type="text" id="fname" name="email" placeholder="Your name..">
                    
                    <label for="lname">Password</label>
                    <input type="password" id="lname" name="password" placeholder="Your password..">
                    <button class="button" style="vertical-align:middle"><span>Sign up</span></button>
        </form>
    </div>
        
    </body>
</html>

<?php
define('MYSQL_HOST', 'localhost');
define('MYSQL_BENUTZER', 'root');
define('MYSQL_KENNWORT', '');
define('MYSQL_DATENBANK', 'smartshift');
$db = mysqli_connect(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);

if(!isset($_POST['vorname'])) {
    return;
}

if(!isset($_POST['nachname'])) {
    return;
}

if(!isset($_POST['email'])) {
    return;
}

if(!isset($_POST['password'])) {
    return;
}
$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];
$password = $_POST['password'];
$query = mysqli_query($db, "INSERT INTO `benutzer`(`Vorname`, `Nachname`, `Email`, `Passwort`) VALUES ('" . $vorname . "','" . $nachname . "','" . $email . "','" . $password . "');");
define('LOGIN_NAME', $vorname);



?>
