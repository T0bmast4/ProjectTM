<html>
    <head>
        <title>SmartShift.at</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../images/Logo.png" type="image/x-icon">
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
            <form action="anmelden.php" method="post">
                <form action="">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="vorname" placeholder="Your first name.." required>
                
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="nachname" placeholder="Your last name.." required>
                    
                    <label for="fname">E-Mail</label>
                    <input type="text" id="fname" name="email" placeholder="Your email.." required>
                    
                    <label for="lname">Password</label>
                    <input type="password" id="lname" name="password" placeholder="Your password.." required>
                    <input type="submit" value="Register" class="submit">
                    
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

if (isset($_POST['vorname']) && isset($_POST['nachname']) && isset($_POST['email']) && isset($_POST['password'])) {
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query_check_duplicate = "SELECT COUNT(*) AS count FROM `benutzer` WHERE `Email` = ?";
    $stmt_check_duplicate = mysqli_prepare($db, $query_check_duplicate);
    mysqli_stmt_bind_param($stmt_check_duplicate, "s", $email);
    mysqli_stmt_execute($stmt_check_duplicate);
    mysqli_stmt_bind_result($stmt_check_duplicate, $count);
    mysqli_stmt_fetch($stmt_check_duplicate);
    mysqli_stmt_close($stmt_check_duplicate);

    if ($count > 0) {
        echo "<script>alert('Ein Benutzer mit dieser E-Mail-Adresse existiert bereits.'); location.href='anmelden.php';</script>";
    } else {
        if (!$db) {
            die("Verbindung zur Datenbank fehlgeschlagen: " . mysqli_connect_error());
        }
        
        if (isset($_POST['vorname']) && isset($_POST['nachname']) && isset($_POST['email']) && isset($_POST['password'])) {
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $query = "INSERT INTO `benutzer`(`Vorname`, `Nachname`, `Email`, `Passwort`) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, "ssss", $vorname, $nachname, $email, $password);
            $result = mysqli_stmt_execute($stmt);
        
            if ($result) {
                echo"<script>alert('Register succeded!'); location.href='index.php';</script>";
            } else {
                echo "<script>alert('Register error.'); location.href='anmelden.php';</script>";
            }
        }
}
}

mysqli_close($db);
?>