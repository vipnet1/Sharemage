<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" type="text/css" href="style.css" >

</head>

<body>

<ul>

<span class="lazerSpan"></span>
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
    <a href="upload.php">Upload</a>
    <a href="signup.php">Signup</a>
    <a id="lastBtn" href="manager.php">File Manager</a>

    <form id="mainForm" method="GET" action="includes/db.search.php">

        <input type="text" placeholder="Search" name="searchfield">

        <?php
        session_start();
        if(isset($_SESSION['user'])) {
            echo '<div id="statsBar" style="color: springgreen;">Logged In</div>';
        } else {
            echo '<div id="statsBar" style="color: crimson;">Please Log In</div>';
        }
        ?>

        

    </form>

</ul>