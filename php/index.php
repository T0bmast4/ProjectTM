<!DOCTYPE html>
<html>
<head>
    <title>SmartShift.at</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/Logo.png" type="image/x-icon">
</head>
<body>

    <div class="navbar">
        <a href="index.php" class="first">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Find Work 
              <i class="fa fa-caret-down"></i>
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
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="categories/video.php">Video & Audio</a>
            <a href="categories/marketing.php">Marketing</a>
            <a href="categories/it.php">IT Developer</a>
            <a href="categories/coaching.php">Coach</a>
            <a href="categories/design.php">Web Designer</a>
          </div>
        </div>
        <a href="anmelden.php" class="laston" id="right">Register</a>
        <a href="login.php" class="laston">Log In</a>
        <a href="profil.php" class="laston" id="userLoggedIn"></a>
    </div>
    <div class="navbartwo">
        <p class="firsttwo">Categories |</p>
        <a href="categories/video.php">Video Editing</a>
        <a href="categories/marketing.php">Marketing</a>
        <a href="categories/it.php">IT Development</a>
        <a href="categories/coaching.php">Coaching</a>
        <a href="categories/design.php">Web Design</a>
    </div>
    <div class="grün">
      <form action="search.php">
        <div class="wrapper">
            <div class="searchBar">
              <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search for &quot;Video Editing&quot; or &quot;Marketing&quot;" value="" />
              
            </div>
        </div>
      </form>
        <img src="../images/Logo.png" class="logogrün">
    </div>
    
    <div class="slide">
        <h1>Top categories</h1>
        <a class="slidedivs" href="categories/video.php"><img class="img" src="../images/video.jpg">Video Editing</a>
        <a class="slidedivs" href="categories/marketing.php"><img class="img" src="../images/marketing.jpg">Marketing</a>
        <a class="slidedivs" href="categories/it.php"><img class="img" src="../images/IT.jpg">Development & IT</a>
        <a class="slidedivs" href="categories/coaching.php"><img class="img" src="../images/coaching.jpg">Coaching</a>
        <a class="slidedivslast" href="categories/design.php"><img class="img" src="../images/Design.jpg">Web Design</a>
    </div>
</body>
</html>
