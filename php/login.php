<html>
    <head>
        <title>Shop</title>
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
