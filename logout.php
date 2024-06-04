<?php
session_start();
 if(isset($_SESSION['username'])){
        session_destroy(); 
		}
require_once("include/connection.php");
?>
<html>
    <head>
        <title>Inventory Manager</title>
        <link rel="stylesheet" type="text/css" href="css/outline.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />		
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/design.js"></script>
        <script type="text/javascript" src="js/validate.js"></script>
    </head>

<body>
<div class="container">
            <div class="header">
                <a href="#">
                    <h1>OPG SIBALIC</h1>
                </a>
                <span class="right">
                    <?php echo "<a href='login.php'>Prijava</a>"; ?>
                </span>
                <div class="clr"></div>
            </div>
<div id="body">
	<div align="center">
    <div class="mcontent">
    	<?php if(isset($_SESSION['username'])){
        		echo "Uspjesna odjava!<div id='data'>OVDJE se <a href='login.php'>se</a> ponovno logirajte</div>"; }
		   else echo "<h1><span>Sesija nije pronadjena!</span></h1><div id='data'>Logirajte se <a href='login.php'>OVDJE</a></div>";
		?>
    </div>
</div>

<?php 
	//require_once("include/footer.php");
?>
