<?php
include 'DB.php';
$db->exec("CREATE TABLE IF NOT EXISTS users(`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `Vorname` VARCHAR(200), `Nachname` VARCHAR(200), `E-Mail` VARCHAR(200), `Password` VARCHAR(200), `ProfilePic` VARCHAR(200));");
$db->exec("CREATE TABLE IF NOT EXISTS workers(`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `Vorname` VARCHAR(200), `Nachname` VARCHAR(200), `E-Mail` VARCHAR(200), `Service` VARCHAR(200), `Price` FLOAT, Worktype VARCHAR(200));");
?>

<!DOCTYPE html>
<html>

<head>
  <title>SmartShift.at</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href="../images/Logo.png" type="image/x-icon">
  <style>
    body {
    overflow: hidden;
    }
  </style>
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
    if(isset($_GET["logout"])) {
      session_destroy();
      session_unset();
      header("Location: index.php");
      exit();
    }
    
    if(!isset($_SESSION["username"])) {
      echo "<a href='register.php' class='laston' id='right'>Register</a>";
      echo "<a href='login.php' class='laston'>Log In</a>";
    } else {
      echo "<div class='laston' id='right'>";
      echo "<a href='profile.php'><img src='../images/profile_pic1.png' height='38px' width='38px' alt='profilepic'></a>";
      echo "<div class='dropdown'>";
      echo "<button class='dropbtn'>" . $_SESSION["username"] . "</button>";
      echo "<div class='dropdown-content'>";
      echo "<a href='profile.php'>Profil</a>";
      echo "<a class='logout' href='../index.php?logout=true'>Logout</a>";
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
  <div class="grün">
    <form action="categories/topworker.php" method="get">
      <div class="wrapper">
        <div class="searchBar">
          <input id="searchQuery" type="text" name="searchQuery" placeholder="Search for &quot;Video Editing&quot; or &quot;Marketing&quot;" value=""/>
        </div>
      </div>
    </form>
    <img src="../images/Logo.png" class="logogrün">
  </div>

  <div class="slide">
    <h1>Top categories</h1>
    <a class="slidedivs" href="categories/topworker.php?categorie=video"><img class="img" src="../images/video.jpg">Video Editing</a>
    <a class="slidedivs" href="categories/topworker.php?categorie=marketing"><img class="img" src="../images/marketing.jpg">Marketing</a>
    <a class="slidedivs" href="categories/topworker.php?categorie=itdev"><img class="img" src="../images/IT.jpg">Development & IT</a>
    <a class="slidedivs" href="categories/topworker.php?categorie=coach"><img class="img" src="../images/coaching.jpg">Coaching</a>
    <a class="slidedivslast" href="categories/topworker.php?categorie=webdesign"><img class="img" src="../images/Design.jpg">Web Design</a>
  </div>
</body>

</html>