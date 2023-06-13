<?php
include '../DB.php';

$workerType = "";
if (isset($_GET["job"])) {
    $workerType = $_GET["job"];
} else if (isset($_POST["job"])) {
    $workerType = $_POST["job"];
}
session_start();
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
            <button class="dropbtn">Find Work</button>
            <div class="dropdown-content">
                <a href="workerregi.php?job=video">Video & Audio</a>
                <a href="workerregi.php?job=marketing">Marketing</a>
                <a href="workerregi.php?job=itdev">IT Developer</a>
                <a href="workerregi.php?job=coach">Coach</a>
                <a href="workerregi.php?job=webdesign">Web Designer</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Top Worker</button>
            <div class="dropdown-content">
                <a href="../categories/topworker.php?categorie=video">Video & Audio</a>
                <a href="../categories/topworker.php?categorie=marketing">Marketing</a>
                <a href="../categories/topworker.php?categorie=itdev">IT Developer</a>
                <a href="../categories/topworker.php?categorie=coach">Coach</a>
                <a href="../categories/topworker.php?categorie=webdesign">Web Designer</a>
            </div>
        </div>
        <?php
        if (!isset($_SESSION["username"])) {
            echo "<a href='../register.php' class='laston' id='right'>Register</a>";
            echo "<a href='../login.php' class='laston'>Log In</a>";
        } else {
            echo "<div class='laston' id='right'>";
            echo "<div class='dropdown'>";
            echo "<button class='dropbtn'>" . $_SESSION["username"] . "</button>";
            echo "<div class='dropdown-content'>";
            echo "<a href='../profile.php'>Profil</a>";
            echo "<a class='logout' href='../index.php?logout=true'>Logout</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
    <div class="navbartwo">
        <p class="firsttwo">Categories |</p>
        <a href="../categories/topworker.php?categorie=video">Video Editing</a>
        <a href="../categories/topworker.php?categorie=marketing">Marketing</a>
        <a href="../categories/topworker.php?categorie=itdev">IT Development</a>
        <a href="../categories/topworker.php?categorie=coach">Coaching</a>
        <a href="../categories/topworker.php?categorie=webdesign">Web Design</a>
    </div>
    <div class="zwischen"></div>
    <div class="site2">
        <?php
        if ($workerType == "video") {
            echo "<h1>Register as Video-Designer</h1>";
        } else if ($workerType == "marketing") {
            echo "<h1>Register as Marketing-Agent</h1>";
        } else if ($workerType == "itdev") {
            echo "<h1>Register as IT-Developer</h1>";
        } else if ($workerType == "coach") {
            echo "<h1>Register as Coach</h1>";
        } else if ($workerType == "webdesign") {
            echo "<h1>Register as Web-Designer</h1>";
        } else {
            echo "<h1>443 Fehler</h1>";
            echo "Dies kann folgende Ursachen haben: ";
            echo "<ul>";
            echo "<li>Die Website ist derzeit nicht erreichbar!</li>";
            echo "<li>Keine Netzwerkverbindung!</li>";
            echo "<li>Die Website wurde nicht richig geladen!</li>";
            echo "<li>Daten wurden nicht richtig übertragen!</li>";
            echo "<li>Fehler bei der Datenbank Verbindung!</li>";
            echo "<li>Daten wurden aus der URL oben rausgelöscht!!!</li>";
            echo "</ul>";
            return;
        }
        ?>
        <form action="workerregi.php" method="post">
            <?php
            if (isset($_SESSION["username"])) {
                echo "<p>Already Logged In</p>";
                echo "<br>";
                echo "<label for='password'>Password</label>";
                echo "<input type='password' id='password' name='password' placeholder='Your password..' required>";
                echo "<label for='Service'>Service</label>";
                echo "<input type='text' id='service' name='service' placeholder='Your service..' required>";
                echo "<label for='preis'>Price</label>";
                echo "<input type='number' id='preis' name='preis' placeholder='Your price..' required>";
                echo "<input type='hidden' name='job' value='" . $workerType . "'>";
            } else {
                echo "<label for='fname'>First Name</label>";
                echo "<input type='text' id='fname' name='vorname' placeholder='Your first name..' required>";
                echo "<label for='lname'>Last Name</label>";
                echo "<input type='text' id='lname' name='nachname' placeholder='Your last name..' required>";
                echo "<label for='email'>E-Mail</label>";
                echo "<input type='email' id='email' name='email' placeholder='Your email..' required>";
                echo "<label for='password'>Password</label>";
                echo "<input type='password' id='password' name='password' placeholder='Your password..' required>";
                echo "<label for='Service'>Service</label>";
                echo "<input type='text' id='service' name='service' placeholder='Your service..' required>";
                echo "<label for='preis'>Price</label>";
                echo "<input type='number' id='preis' name='preis' placeholder='Your price..' required>";
                echo "<input type='hidden' name='job' value='" . $workerType . "'>";
            }
            ?>

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
    $workerType = $_POST['job'];

    $statement1 = $db->prepare("SELECT * FROM users WHERE `vorname`=:vorname;");
    $statement1->bindParam(":vorname", $vorname);
    $statement1->execute();

    $hasAccount = false;
    while ($row = $statement1->fetch(PDO::FETCH_ASSOC)) {
        if ($row['E-Mail'] == $email) {
            $passwordWithSalt = $password . $row["Salt"];
            $encryptedPassword = password_hash($passwordWithSalt, PASSWORD_BCRYPT);
            if ($row['Password'] = $encryptedPassword) {
                $hasAccount = true;
            }
        }
    }

    if (!$hasAccount) {
        $statement = $db->prepare("INSERT INTO `users`(`Vorname`, `Nachname`, `E-Mail`, `Password`) VALUES (:vorname, :nachname, :email, :password)");

        $statement->bindParam(":vorname", $vorname);
        $statement->bindParam(":nachname", $nachname);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $password);
        $statement->execute();
    }

    $statement = $db->prepare("INSERT INTO `workers`(`Vorname`, `Nachname`, `E-Mail`, `Service`, `Price`, `Worktype`) VALUES (:vorname, :nachname, :email, :service, :preis, :worktype)");

    $statement->bindParam(":vorname", $vorname);
    $statement->bindParam(":nachname", $nachname);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":service", $service);
    $statement->bindParam(":preis", $preis);
    $statement->bindParam(":worktype", $workerType);
    $statement->execute();

    header("Location: ../categories/topworker.php?categorie=" . $workerType);




} else if (isset($_SESSION["username"]) && isset($_POST['password']) && isset($_POST['service']) && isset($_POST['preis'])) {
    $vorname = $_SESSION["username"];
    $nachname = "";
    $email = "";
    $service = $_POST['service'];
    $preis = $_POST['preis'];
    $workerType = $_POST['job'];

    $statement1 = $db->prepare("SELECT * FROM users WHERE `vorname`=:vorname;");
    $statement1->bindParam(":vorname", $vorname);
    $statement1->execute();

    $valid = false;
    while ($row = $statement1->fetch(PDO::FETCH_ASSOC)) {
        $nachname = $row["Nachname"];
        $email = $row["E-Mail"];
        $username = $row["Vorname"];
        $passwordWithSalt = $_POST['password'] . $row["Salt"];
        $encryptedPassword = password_hash($passwordWithSalt, PASSWORD_BCRYPT);
        if ($row["Password"] == $encryptedPassword) {
            $valid = true;
            echo "True";
        }
    }
    if ($valid) {
        $statement = $db->prepare("INSERT INTO `workers`(`Vorname`, `Nachname`, `E-Mail`, `Service`, `Price`, `Worktype`) VALUES (:vorname, :nachname, :email, :service, :preis, :worktype)");

        $statement->bindParam(":vorname", $vorname);
        $statement->bindParam(":nachname", $nachname);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":service", $service);
        $statement->bindParam(":preis", $preis);
        $statement->bindParam(":worktype", $workerType);
        $statement->execute();
        //header("Location: ../categories/topworker.php?categorie=" . $workerType);
    } else {
        echo "<h3 class='error'>Bitte überprüfe dein Passwort!</h3>";
    }
}
?>