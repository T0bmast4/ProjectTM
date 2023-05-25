<?php
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
?>