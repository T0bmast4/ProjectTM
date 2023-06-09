<?php
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "");
define("MYSQL_DATABASE", "projekt");

$dsn = "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE;

try {
    $db = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
} catch (PDOException $e) {
    
}
$workerType = $_GET['job'];
?>
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
                    <a href="workerregi.php?job=video">Video & Audio</a>
                    <a href="workerregi.php?job=marketing">Marketing</a>
                    <a href="workerregi.php?job=itdev">IT Developer</a>
                    <a href="workerregi.php?job=coach">Coach</a>
                    <a href="workerregi.php?job=webdesign">Web Designer</a>
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
            <?php
            if($workerType == "video") {
                echo "<h1>Register as Video-Designer</h1>";
            } else if($workerType == "marketing") {
                echo "<h1>Register as Marketing-Agent</h1>";
            } else if($workerType == "itdev") {
                echo "<h1>Register as IT-Developer</h1>";
            } else if($workerType == "coach") {
                echo "<h1>Register as Coach</h1>";
            } else if($workerType == "webdesign") {
                echo "<h1>Register as Webdesigner</h1>";
            }
            ?>
            <form action="workerregi.php" method="post">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="vorname" placeholder="Your first name.." required>
                
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="nachname" placeholder="Your last name.." required>
                    
                <label for="email">E-Mail</label>
                <input type="text" id="email" name="email" placeholder="Your email.." required>
                    
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your password.." required>

                <label for="Service">Service</label>
                <input type="text" id="service" name="service" placeholder="Your service.." required>

                <label for="preis">Price</label>
                <input type="text" id="preis" name="preis" placeholder="Your price.." required>
                <input type="submit" value="Register" class="submit">
            </form>
    </div>
    </body>
</html>
<?php
if (isset($_POST['vorname']) && isset($_POST['nachname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['service']) && isset($_POST['preis'])) {
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $service = $_POST['service'];
    $preis = $_POST['preis'];

    $statement = $db->prepare("INSERT INTO workers (Vorname, Nachname, E-Mail, Password, Service, Price, Worktype) VALUES (:vorname, :nachname, :email, :password, :service, :preis, :worktype);");

    $statement->bindParam(':vorname', $vorname);
    $statement->bindParam(':nachname', $nachname);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    $statement->bindParam(':service', $service);
    $statement->bindParam(':preis', $preis);
    $statement->bindParam(':worktype', $workerType);
    $statement->execute();
}
?>
