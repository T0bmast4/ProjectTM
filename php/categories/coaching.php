<html>
    <head>
        <title>SmartShift.at</title>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="shortcut icon" href="../../images/Logo.png" type="image/x-icon">
        <style>
          .service{
            background-color: #dfe6de;
            margin-right: 15%;
            margin-left: 15%;
            font-family: fantasy;
            text-align: center;
            border-radius: 20px;
            
          }
          th{
            padding-right: 30px;
            padding-left: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 25px;
          }
          td{
            padding-right: 30px;
            padding-left: 30px;
            padding-bottom: 10px;
            text-align: center;
            border-bottom: solid 1px black;
            font-size: 20px;
            padding-top: 10px
          }

          table{
            margin: 0 auto; 
          }

          .bordertd{
            border: solid 2px black;
          }

          tr{
            border: solid 2px black;
          }

          th, td {
            border-bottom: 2px solid black;
          }

          table {
            border-collapse: collapse; 
          }

          .mailto{
            text-decoration: none;
            border: solid 1px #39887f;
            background-color: #39887f;
            padding: 3 10;
            border-radius: 10px;
            color: white;
            box-shadow: 4px 4px 4px grey;
          }

          .zws{
            height: 20px;
          }
        </style>
    </head>
    <body>

        <div class="navbar">
            <a href="../index.php" class="first">Home</a>
            <div class="dropdown">
                <button class="dropbtn">Find Work 
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="../workerregi/videoregi.php">Video & Audio</a>
                    <a href="../workerregi/marketingregi.php">Marketing</a>
                    <a href="../workerregi/itregi.php">IT Developer</a>
                    <a href="../workerregi/coachregi.php">Coach</a>
                    <a href="../workerregi/designregi.php">Web Designer</a>
                </div>
              </div>
            <div class="dropdown">
              <button class="dropbtn">Top Worker
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="video.php">Video & Audio</a>
                    <a href="marketing.php">Marketing</a>
                    <a href="it.php">IT Developer</a>
                    <a href="caoching.php">Coaches</a>
                    <a href="coaching.php">Web Designer</a>
              </div>
            </div>
            <a href="../anmelden.php" class="laston" id="right">Register</a>
            
            <a href="../login.php" class="laston">Log In</a>
        </div>
        <div class="navbartwo">
            <p class="firsttwo">Categories |</p>
            <a href="video.php">Video Editing</a>
            <a href="marketing.php">Marketing</a>
            <a href="it.php">IT Development</a>
            <a href="coaching.php">Coaching</a>
            <a href="design.php">Web Design</a>
        </div>
        <div class="zwischen"></div>
        <div class="service">
<?php
define('MYSQL_HOST', 'localhost');
define('MYSQL_BENUTZER', 'root');
define('MYSQL_KENNWORT', '');
define('MYSQL_DATENBANK', 'projekt');
$db = mysqli_connect(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);

if (!$db) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . mysqli_connect_error());
}

$query = "SELECT * FROM `coachworker`";
$result = mysqli_query($db, $query);

if (!$result) {
    die("Abfrage fehlgeschlagen: " . mysqli_error($db));
}


?>
<div>
  <h1>Coaches</h1>
</div>
<table>
    <thead>
        <tr>
            <th>Name</th>

            <th>Service</th>
            <th>Preis</th>
            <th>Contact</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td class="tdeins"><?php echo $row['Vorname']." "; echo $row['Nachname']; ?></td>
                
                <td><?php echo $row['Service']; ?></td>
                <td><?php echo $row['Preis']; ?></td>
                <td><a href="mailto:<?php echo $row['Email']; ?>" class="mailto">Contact</a></td>
              </tr>
        <?php } ?>
    </tbody>
</table>
<div class="zws"></div>

<?php
mysqli_close($db);
?>

        </div>
</html>
