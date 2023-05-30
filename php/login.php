<html>
    <head>
        <title>SmartShift.at</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../../images/Logo.png" type="image/x-icon">
    </head>
    <body>

        <div class="navbar">
            <a href="index.php" class="first">Home</a>
            <div class="dropdown">
                <button class="dropbtn">Find Work 
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="workerregi/videoregi.php">Video & Audio</a>
                    <a href="workerregi/marketingregi.php">Marketing</a>
                    <a href="workerregi/itregi.php">IT Developer</a>
                    <a href="workerregi/coachregi.php">Coach</a>
                    <a href="workerregi/designregi.php">Web Designer</a>
                </div>
              </div>
            <div class="dropdown">
              <button class="dropbtn">Top Worker
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="categories/video.php">Video & Audio</a>
                    <a href="categories/marketing.php">Marketing</a>
                    <a href="categories/it.php">IT Developer</a>
                    <a href="categories/coaching.php">Coach</a>
                    <a href="categories/design.php">Web Designer</a>
              </div>
            </div>
            <a href="anmelden.php" class="laston" id="right">Register</a>
            <a href="login.php" class="laston">Log In</a>
        </div>
        <div class="navbartwo">
            <p class="firsttwo">Categories |</p>
            <a href="categories/video.php">Video Editing</a>
            <a href="categories/marketing.php">Marketing</a>
            <a href="categories/it.php">IT Development</a>
            <a href="categories/coaching.php">Coaching</a>
            <a href="categories/design.php">Web Design</a>
        </div>
        <div class="zwischen"></div>
        <div class="site2">
            <form action="login.php" method="post">
                <form action="">
                    <label for="fname">E-Mail</label>
                    <input type="text" id="fname" name="email" placeholder="Your email.." required>
                    
                    <label for="lname">Password</label>
                    <input type="password" id="lname" name="password" placeholder="Your password.." required>
                    <input type="submit" value="Log In" class="submit">
                    
        </form>
    </div>
    </body>
</html>
<?php

define('MYSQL_HOST', 'localhost');
define('MYSQL_BENUTZER', 'root');
define('MYSQL_KENNWORT', '');
define('MYSQL_DATENBANK', 'projekt');
$db = mysqli_connect(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);

if (!$db) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . mysqli_connect_error());
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM benutzer WHERE Email='$email' AND Passwort='$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {

        echo"<script>alert('Log In succeded!'); location.href='index.php';</script>";
        

    } 
    
    else {
        echo "<script>alert('Email or Password wrong. Try agian.'); location.href='login.php';</script>";
    }
}
?>