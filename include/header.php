<?php
session_start();
require_once("include/connection.php");

// Check if the user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>OPG Inventory Manager</title>
    <link rel="stylesheet" type="text/css" href="../css/outline.css" />
    <link rel="stylesheet" type="text/css" href="../css/menu.css" />
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/validate.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
</head>
<body>
<div class="container">
    <div class="header">
        <a href='../index.php'></a>
        <span class="right">
            <?php
            if(isset($_SESSION['username'])) {
                echo "<a href='../logout.php'>Odjava</a>";
            } else {
                echo "<a href='../login.php'>Prijava</a>";
            }
            ?>
            <br/>
            <a>
                Dobar dan
                <strong>
                    <?php
                    if(isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    }
                    ?>
                </strong>
            </a>
        </span>
        <div class="clr"></div>
    </div>
</div>
</body>
</html>