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
        echo "<script>alert('Ein Benutzer mit dieser E-Mail-Adresse existiert bereits.'); location.href='videoregi.php';</script>";
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
                echo"<script>alert('Register succeded!'); location.href='index.html';</script>";
            } else {
                echo "<script>alert('Register error.'); location.href='login.php';</script>";
            }
        }
}
}

mysqli_close($db);
?>



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

    $query = "INSERT INTO `benutzer`(`Vorname`, `Nachname`, `Email`, `Passwort`) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $vorname, $nachname, $email, $password);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo"<script>alert('Register succeded!'); location.href='index.html';</script>";
    } else {
        echo "<script>alert('Register error.'); location.href='login.php';</script>";
    }
}
?>