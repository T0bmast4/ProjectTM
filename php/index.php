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
                <a href="workerregi/videoregi.php">Video & Audio</a>
                <a href="workerregi/marketingregi.php">Marketing</a>
                <a href="workerregi/itregi.php">IT Developer</a>
                <a href="workerregi/coachregi.php">Coach</a>
                <a href="workerregi/designregi.php">Web Designer</a>
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
              <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                </svg>
              </button>
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

    <script>
        var username = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
        var userLoggedInElement = document.getElementById("userLoggedIn");
        
        if (username !== '') {
            var h2 = document.createElement("h2");
            h2.textContent = "Angemeldet als: " + $username;
            userLoggedInElement.appendChild(h2);
        }
    </script>
</body>
</html>
