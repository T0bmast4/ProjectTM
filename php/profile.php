<?php
include 'DB.php';
?>

<html>

<head>
    <title>SmartShift.at</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/Logo.png" type="image/x-icon">
</head>

<body>

    <div class="navbar">
        <a href="index.php" id="first">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Find Work
            </button>
            <div class="dropdown-content">
        <a href="workerregi/workerregi.php?job=video">Video & Audio</a>
        <a href="workerregi/workerregi.php?job=marketing">Marketing</a>
        <a href="workerregi/workerregi.php?job=itdev">IT Developer</a>
        <a href="workerregi/workerregi.php?job=coach">Coach</a>
        <a href="workerregi/workerregi.php?job=webdesign">Web Designer</a>
      </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Top Worker
            </button>
            <div class="dropdown-content">
                <a href="categories/topworker.php?categorie=video">Video & Audio</a>
                <a href="categories/topworker.php?categorie=marketing">Marketing</a>
                <a href="categories/topworker.php?categorie=itdev">IT Developer</a>
                <a href="categories/topworker.php?categorie=coach">Coach</a>
                <a href="categories/topworker.php?categorie=webdesign">Web Designer</a>
            </div>
        </div>
        <?php
        session_start();

        if (!isset($_SESSION["username"])) {
            echo "<a href='register.php' class='laston' id='right'>Register</a>";
            echo "<a href='login.php' class='laston'>Log In</a>";
            echo "<h1 class='error'>Sie sind nicht angemeldet!</h1>";
            return;
        } else {
            echo "<div class='laston' id='right'>";
            echo "<a href='profile.php'><img src='../images/profile_pic1.png' height='38px' width='38px' alt='profilepic'></a>";
            echo "<div class='dropdown'>";
            echo "<button class='dropbtn'>" . $_SESSION["username"] . "</button>";
            echo "<div class='dropdown-content'>";
            echo "<a href='profile.php'>Profil</a>";
            echo "<a class='logout' href='index.php?logout=true'>Logout</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
    <div class="navbartwo">
        <p class="firsttwo">Categories |</p>
        <a href="categories/topworker.php?categorie=video">Video Editing</a>
        <a href="categories/topworker.php?categorie=marketing">Marketing</a>
        <a href="categories/topworker.php?categorie=itdev">IT Development</a>
        <a href="categories/topworker.php?categorie=coach">Coaching</a>
        <a href="categories/topworker.php?categorie=webdesign">Web Design</a>
    </div>
    <div class="zwischen"></div>
    <div class="site2">
        <form action="profile.php" method="post">
            <h3>Profilbild auswählen</h3>
            <img src="../images/profile_pic1.png" width="50" height="50" alt="profilepic1">
            <input type="radio" name="profilepic" value="Profilbild1">
            <img src="../images/profile_pic2.png" width="50" height="50" alt="profilepic2">
            <input type="radio" name="profilepic" value="Profilbild2">
            <img src="../images/profile_pic3.png" width="50" height="50" alt="profilepic3">
            <input type="radio" name="profilepic" value="Profilbild3">
            <img src="../images/profile_pic4.png" width="50" height="50" alt="profilepic4">
            <input type="radio" name="profilepic" value="Profilbild4">
            <img src="../images/profile_pic5.png" width="50" height="50" alt="profilepic5">
            <input type="radio" name="profilepic" value="Profilbild5">
            <input type="submit" value="Update Picture" class="submit">
            
            <h3>Update E-Mail</h4>
            <label for="oldEmail">Old E-Mail</label>
            <input type="email" id="oldEmail" name="oldEmail" placeholder="Your old email..">

            <label for="email">New E-Mail</label>
            <input type="email" id="email" name="email" placeholder="Your new email..">

            <label for="passwordForEmail">Password</label>
            <input type="password" id="passwordForEmail" name="passwordForEmail" placeholder="Your password..">
            <input type="submit" value="Update E-Mail" class="submit">

            <br>
            <br>
            <h3>Update Password</h4>
            <label for="emailForPassword">E-Mail</label>
            <input type="email" id="emailForPassword" name="emailForPassword" placeholder="Your email..">

            <label for="oldPassword">Old Password</label>
            <input type="password" id="oldPassword" name="oldPassword" placeholder="Your old password..">

            <label for="newPassword1">New Password</label>
            <input type="password" id="newPassword" name="newPassword" placeholder="Your new password..">
            <input type="submit" value="New Password" class="submit">
        </form>
        <?php
        if(isset($_POST["email"]) && isset($_POST["oldEmail"]) && isset($_POST["passwordForEmail"])) {
            $stmt = $db->prepare("SELECT * FROM users WHERE `E-Mail`=:email;");
            $stmt->bindParam(":email", $_POST["emailForPassword"]);
            $stmt->execute();

            $valid = false;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hashedPassword = $row["Password"];
        
                if (password_verify($_POST["passwordForEmail"], $hashedPassword)) {
                    $valid = true;
                }
            }
            if($valid) {
                $statement = $db->prepare("UPDATE `users` SET `E-Mail`=:email WHERE `E-Mail` = :oldEmail");
                $statement->bindParam(":email", $_POST["email"]);
                $statement->bindParam(":oldEmail", $_POST["oldEmail"]);
                $statement->execute();
                header("Location: index.php");
            }else{
                echo "<h3 class='error'>Bitte überprüfe die eingegebenen Daten!</h3>";
            }
        }
        if(isset($_POST["newPassword"]) && isset($_POST["oldPassword"]) && isset($_POST["emailForPassword"])){
            $password = $_POST["oldPassword"];
            $newPassword = $_POST["newPassword"];
            $email = $_POST["emailForPassword"];
            $stmt = $db->prepare("SELECT * FROM `users` WHERE `E-Mail`=:email;");
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            $valid = false;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hashedPassword = $row["Password"];
                if (password_verify($password, $hashedPassword)) {
                    $valid = true;
                    echo "Test2";
                }
            }
            if($valid) {
                echo "Test3";
                $encryptedPasswordNew = password_hash($password, PASSWORD_BCRYPT);
                $statement = $db->prepare("UPDATE `users` SET `Password`=:newPassword WHERE `E-Mail` = :email");
                $statement->bindParam(":newPassword", $encryptedPasswordNew);
                $statement->bindParam(":email", $email);
                $statement->execute();
                //header("Location: index.php");
                echo "<h3 id='confirm'>Ihr Passwort wurder erfolgreich geändert!</h3>";
            }else{
                echo "False2";
                echo "<h3 class='error'>Bitte überprüfe die eingegebenen Daten!</h3>";
            }


        }
        if(isset($_POST["profilepic"])) {
            $username = $_SESSION["username"];
            $profilepic = $_POST["profilepic"];
            $statement = $db->prepare("UPDATE `users` SET `ProfilePic`=:profilepic WHERE `Vorname` = :vorname");
            $statement->bindParam(":profilepic", $profilepic);
            $statement->bindParam(":vorname", $username);
            $statement->execute();
        }
        ?>
    </div>
</body>
</html>