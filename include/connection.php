<?php
require_once("constants.php");
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
