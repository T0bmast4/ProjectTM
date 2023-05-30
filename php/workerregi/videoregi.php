<html>
    <head>
        <title>SmartShift.at</title>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="shortcut icon" href="../../images/Logo.png" type="image/x-icon">
    </head>
    <body>
        <div class="navbar">
            <a href="../index.php" class="first">Home</a>
            <div class="dropdown">
                <button class="dropbtn">Find Work 
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="videoregi.php">Video & Audio</a>
                    <a href="marketingregi.php">Marketing</a>
                    <a href="itregi.php">IT Developer</a>
                    <a href="coachregi.php">Coach</a>
                    <a href="designregi.php">Web Designer</a>
                </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Top Worker 
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="../categories/video.php">Video & Audio</a>
                    <a href="../categories/marketing.php">Marketing</a>
                    <a href="../categories/it.php">IT Developer</a>
                    <a href="../categories/coaching.php">Coach</a>
                    <a href="../categories/design.php">Web Designer</a>
              </div>
            </div>
            <a href="../anmelden.php" class="laston" id="right">Register</a>
            <a href="../login.php" class="laston">Log In</a>
        </div>
        <div class="navbartwo">
            <p class="firsttwo">Categories |</p>
                    <a href="../categories/video.php">Video & Audio</a>
                    <a href="../categories/marketing.php">Marketing</a>
                    <a href="../categories/it.php">IT Development</a>
                    <a href="../categories/coaching.php">Coach</a>
                    <a href="../categories/design.php">Web Designer</a>
        </div>
        <div class="zwischen"></div>
        <div class="site2">
        <h1>Register as Worker for Video & Audio</h1>
            <form action="videoregi.php" method="post">
                <form action="">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="vorname" placeholder="Your first name.." required>
                
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="nachname" placeholder="Your last name.." required>
                    
                    <label for="fname">E-Mail</label>
                    <input type="text" id="fname" name="email" placeholder="Your email.." required>
                    
                    <label for="lname">Password</label>
                    <input type="password" id="lname" name="password" placeholder="Your password.." required>

                    <label for="lname">Service</label>
                    <input type="text" id="fname" name="service" placeholder="Your service.." required>

                    <label for="lname">Price</label>
                    <input type="text" id="lname" name="preis" placeholder="Your price.." required>
                    <input type="submit" value="Register" class="submit">
                    
        </form>
    </div>
    </body>
</html>
<?php
session_start();

define('MYSQL_HOST', 'localhost');
define('MYSQL_BENUTZER', 'root');
define('MYSQL_KENNWORT', '');
define('MYSQL_DATENBANK', 'projekt');
$db = mysqli_connect(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);

if (!$db) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . mysqli_connect_error());
}

if (isset($_POST['vorname']) && isset($_POST['nachname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['service']) && isset($_POST['preis'])) {
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $service = $_POST['service'];
    $preis = $_POST['preis'];

    // Überprüfen, ob der Benutzer bereits in der 'benutzer'-Tabelle existiert
    $query_check_user = "SELECT COUNT(*) AS count FROM `benutzer` WHERE `Email` = ?";
    $stmt_check_user = mysqli_prepare($db, $query_check_user);
    mysqli_stmt_bind_param($stmt_check_user, "s", $email);
    mysqli_stmt_execute($stmt_check_user);
    mysqli_stmt_bind_result($stmt_check_user, $count);
    mysqli_stmt_fetch($stmt_check_user);
    mysqli_stmt_close($stmt_check_user);

    if ($count > 0) {
        // Der Benutzer existiert bereits in der 'benutzer'-Tabelle
        // Überprüfen, ob die E-Mail-Adresse bereits in der 'videoworker'-Tabelle vorhanden ist
        $query_check_videoworker = "SELECT COUNT(*) AS count FROM `videoworker` WHERE `Email` = ?";
        $stmt_check_videoworker = mysqli_prepare($db, $query_check_videoworker);
        mysqli_stmt_bind_param($stmt_check_videoworker, "s", $email);
        mysqli_stmt_execute($stmt_check_videoworker);
        mysqli_stmt_bind_result($stmt_check_videoworker, $count_videoworker);
        mysqli_stmt_fetch($stmt_check_videoworker);
        mysqli_stmt_close($stmt_check_videoworker);

        if ($count_videoworker > 0) {
            // Die E-Mail-Adresse existiert bereits in der 'videoworker'-Tabelle
            $_SESSION['username'] = $vorname; // Speichern des Benutzernamens in der Session
            echo "<script>alert('Registrierung erfolgreich!'); location.href='../index.php';</script>";
        } else {
            // Die E-Mail-Adresse existiert noch nicht in der 'videoworker'-Tabelle
            // Füge den Eintrag in die 'videoworker'-Tabelle ein
            $query_videoworker = "INSERT INTO `videoworker`(`Vorname`, `Nachname`, `Email`, `Passwort`, `Preis`, `Service`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_videoworker = mysqli_prepare($db, $query_videoworker);
            mysqli_stmt_bind_param($stmt_videoworker, "ssssss", $vorname, $nachname, $email, $password, $preis, $service);
            $result_videoworker = mysqli_stmt_execute($stmt_videoworker);

            if ($result_videoworker) {
                // Eintrag erfolgreich erstellt
                // Füge den Eintrag in die 'benutzer'-Tabelle ein
                $query_benutzer = "INSERT INTO `benutzer`(`Vorname`, `Nachname`, `Email`, `Passwort`) VALUES (?, ?, ?, ?)";
                $stmt_benutzer = mysqli_prepare($db, $query_benutzer);
                mysqli_stmt_bind_param($stmt_benutzer, "ssss", $vorname, $nachname, $email, $password);
                $result_benutzer = mysqli_stmt_execute($stmt_benutzer);

                if ($result_benutzer) {
                    $_SESSION['username'] = $vorname; // Speichern des Benutzernamens in der Session
                    echo "<script>alert('Email bereits vergeben'); location.href='videoregi.php';</script>";
                } else {
                    echo "<script>alert('Fehler beim Erstellen des Eintrags für Benutzer.'); location.href='videoregi.php';</script>";
                }
            } else {
                echo "<script>alert('Fehler beim Erstellen des Eintrags für Video-Worker.'); location.href='videoregi.php';</script>";
            }
        }
    } else {
        // Der Benutzer existiert noch nicht in der 'benutzer'-Tabelle
        // Füge den Eintrag in beide Tabellen ein

        // Eintrag in die 'benutzer'-Tabelle einfügen
        $query_benutzer = "INSERT INTO `benutzer`(`Vorname`, `Nachname`, `Email`, `Passwort`) VALUES (?, ?, ?, ?)";
        $stmt_benutzer = mysqli_prepare($db, $query_benutzer);
        mysqli_stmt_bind_param($stmt_benutzer, "ssss", $vorname, $nachname, $email, $password);
        $result_benutzer = mysqli_stmt_execute($stmt_benutzer);

        // Eintrag in die 'videoworker'-Tabelle einfügen
        $query_videoworker = "INSERT INTO `videoworker`(`Vorname`, `Nachname`, `Email`, `Passwort`, `Preis`, `Service`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_videoworker = mysqli_prepare($db, $query_videoworker);
        mysqli_stmt_bind_param($stmt_videoworker, "ssssss", $vorname, $nachname, $email, $password, $preis, $service);
        $result_videoworker = mysqli_stmt_execute($stmt_videoworker);

        if ($result_benutzer && $result_videoworker) {
            $_SESSION['username'] = $vorname; // Speichern des Benutzernamens in der Session
            echo "<script>alert('Registrierung erfolgreich!'); location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Fehler beim Erstellen des Eintrags für Benutzer oder Video-Worker.'); location.href='videoregi.php';</script>";
        }
    }
}
?>



