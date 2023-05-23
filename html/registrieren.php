<?php
define('MYSQL_HOST', '38.242.141.75');
define('MYSQL_USER', 'USERNAME');
define('MYSQL_PASSWORD', 'PASSWORD');
define('MYSQL_DATENBANK', 'accounts');

$dsn = "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATENBANK;

try {
    $db = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
} catch (PDOException $e) {
    
}
?>

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

$statement = $db->prepare("INSERT INTO `user`(`VORNAME`, `NACHNAME`, `EMAIL`, `PASSWORD`) VALUES (':vorname',':nachname',':email',':password');");
$statement->bindParam(':vorname', $vorname);
$statement->execute();

?>
