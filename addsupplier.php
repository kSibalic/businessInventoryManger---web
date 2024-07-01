<?php
require_once("include/header.php");
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, 'utf8mb4');
?>
<div id="body">
    <?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
        <h1><span>Popis dobavljaca:</span></h1>
        <div id="data">Pregled svih dobavljaca <a style="text-decoration:none" href="viewlist.php?list=supplier">OVDJE</a><br /><br />
            <?php
            if(isset($_GET['success'])){
                $sdealer = mysqli_real_escape_string($connect, $_POST['sdealer']);
                $semail = mysqli_real_escape_string($connect, $_POST['semail']);
                $saddress = mysqli_real_escape_string($connect, $_POST['saddress']);
                $sphone = mysqli_real_escape_string($connect, $_POST['sphone']);
                $result = mysqli_query($connect, "INSERT INTO supplier VALUES('$sdealer','$semail',NULL,'$saddress','$sphone')");
                if(!$result) echo "Dodavanje NIJE uspjelo!";
                else echo "Dodavanje dobavljaca uspjesno!";
            }
            else{
                echo "<form method='post' action='addsupplier.php?success=1'>
                    <table>
                        <tr><td style='padding:5px'>Naziv: </td><td><input name='sdealer' type='text' /></td></tr>
                        <tr><td style='padding:5px'>Adresa: </td><td><input name='saddress' type='text' /></td></tr>
                        <tr><td style='padding:5px'>Telefon: </td><td><input name='sphone' placeholder='+385..' type='text' /></td></tr>
                        <tr><td style='padding:5px'>Email: </td><td><input name='semail' placeholder='ime@email.com' type='text' /></td></tr>
                        <tr><td style='padding:5px' colspan='2'><input type='submit' value='Spremi' /></td></tr>
                    </table></form>";
            }
            ?>
        </div>
    </div>
</div>

<?php
require_once("include/footer.php");
?>
