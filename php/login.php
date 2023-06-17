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
        <form action="login.php" method="post">
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email" placeholder="Your email.." required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Your password.." required>
            <input type="submit" value="Log In" class="submit">
        </form>
        <?php
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
        
            $stmt = $db->prepare("SELECT * FROM users WHERE `E-Mail`=:email;");
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            $valid = false;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hashedPassword = $row["Password"];
                $username = $row["Vorname"];
        
                if (password_verify($password, $hashedPassword)) {
                    $valid = true;
                }
            }

            if($valid) {
                session_start();
                $_SESSION["username"] = $username;
                header("Location: index.php");
            }else{
                echo "<h3 class='error'>Bitte überprüfe die Login-Daten!</h3>";
            }
        }
        ?>
    </div>
</body>

</html>