<?php
include '../DB.php';

$categorie = "";
if (isset($_GET["categorie"])) {
    $categorie = $_GET["categorie"];
}
?>
<html>

<head>
    <title>SmartShift.at</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../images/Logo.png" type="image/x-icon">
    <style>
        .service {
            background-color: #dfe6de;
            margin-right: 15%;
            margin-left: 15%;
            font-family: fantasy;
            text-align: center;
            border-radius: 20px;

        }

        th {
            padding-right: 30px;
            padding-left: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 25px;
        }

        td {
            padding-right: 30px;
            padding-left: 30px;
            padding-bottom: 10px;
            text-align: center;
            border-bottom: solid 1px black;
            font-size: 20px;
            padding-top: 10px
        }

        table {
            margin: 0 auto;
        }

        .bordertd {
            border: solid 2px black;
        }

        tr {
            border: solid 2px black;
        }

        th,
        td {
            border-bottom: 2px solid black;
        }

        table {
            border-collapse: collapse;
        }

        .mailto {
            text-decoration: none;
            border: solid 1px #39887f;
            background-color: #39887f;
            padding: 3 10;
            border-radius: 10px;
            color: white;
            box-shadow: 4px 4px 4px grey;
        }

        .zws {
            height: 20px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="../index.php" class="first">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Find Work
            </button>
            <div class="dropdown-content" 2>
                <a href="../workerregi/workerregi.php?job=video">Video & Audio</a>
                <a href="../workerregi/workerregi.php?job=marketing">Marketing</a>
                <a href="../workerregi/workerregi.php?job=itdev">IT Developer</a>
                <a href="../workerregi/workerregi.php?job=coach">Coach</a>
                <a href="../workerregi/workerregi.php?job=webdesign">Web Designer</a>
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
        session_start();
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
        <a href="topworker.php?categorie=video">Video Editing</a>
        <a href="topworker.php?categorie=marketing">Marketing</a>
        <a href="topworker.php?categorie=itdev">IT Development</a>
        <a href="topworker.php?categorie=coach">Coaching</a>
        <a href="topworker.php?categorie=webdesign">Web Design</a>
    </div>
    <div class="zwischen"></div>
    <div class="service">

        <div>
            <?php
            if ($categorie == "video") {
                echo "<h1>Video & Audio Worker</h1>";
            } else if ($categorie == "marketing") {
                echo "<h1>Marketing Worker</h1>";
            } else if ($categorie == "itdev") {
                echo "<h1>IT Developer</h1>";
            } else if ($categorie == "coach") {
                echo "<h1>Coaches</h1>";
            } else if ($categorie == "webdesign") {
                echo "<h1>Web-Designer</h1>";
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
                <?php

                $stmt = $db->prepare("SELECT * FROM `workers` WHERE `worktype`=:categorie");
                $stmt->bindParam(":categorie", $categorie);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td class='tdeins'>" . $row["Vorname"] . " " . $row["Nachname"] . "</td>";
                    echo "<td>" . $row["Service"] . "</td>";
                    echo "<td>" . $row["Price"] . "</td>";
                    echo "<td><a href='mailto:" . $row['E-Mail'] . "' class='mailto'>Contact</a></td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

</html>