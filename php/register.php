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
            <button class="dropbtn">Find Work</button>
            <div class="dropdown-content">
        <a href="workerregi/workerregi.php?job=video">Video & Audio</a>
        <a href="workerregi/workerregi.php?job=marketing">Marketing</a>
        <a href="workerregi/workerregi.php?job=itdev">IT Developer</a>
        <a href="workerregi/workerregi.php?job=coach">Coach</a>
        <a href="workerregi/workerregi.php?job=webdesign">Web Designer</a>
      </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Top Worker</button>
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
        <form action="register.php" method="post">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="vorname" placeholder="Your first name.." required>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="nachname" placeholder="Your last name.." required>

            <label for="fname">E-Mail</label>
            <input type="email" id="fname" name="email" placeholder="Your email.." required>

            <label for="lname">Password</label>
            <input type="password" id="lname" name="password" placeholder="Your password.." required>
            <input type="submit" value="Register" class="submit">
        </form>

        <?php
        if (isset($_POST['vorname']) && isset($_POST['nachname']) && isset($_POST['email']) && isset($_POST['password'])) {
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $statement1 = $db->prepare("SELECT * FROM users");
            $statement1->execute();

            $accountExists = false;
            while ($row = $statement1->fetch(PDO::FETCH_ASSOC)) {
                if ($row['E-Mail'] == $email) {
                    $accountExists = true;
                }
            }

            if ($accountExists) {
                echo "<h3 class='error'>Es gibt bereits einen Benutzer mit dieser E-Mail!</h3>";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $profilepic = "Profilbild1";
                $statement = $db->prepare("INSERT INTO users (Vorname, Nachname, `E-Mail`, Password, ProfilePic) VALUES (:vorname, :nachname, :email, :password, :profilepic)");
                $statement->bindParam(":vorname", $vorname);
                $statement->bindParam(":nachname", $nachname);
                $statement->bindParam(":email", $email);
                $statement->bindParam(":password", $hashedPassword);
                $statement->bindParam(":profilepic", $profilepic);
                $statement->execute();

                $_SESSION["username"] = $vorname;
                header("Location: index.php");
            }
        }
        ?>
    </div>
</body>

</html>