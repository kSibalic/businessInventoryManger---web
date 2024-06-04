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
                $dealer = mysqli_real_escape_string($connect, $_POST['dealer']);
                $email = mysqli_real_escape_string($connect, $_POST['email']);
                $address = mysqli_real_escape_string($connect, $_POST['address']);
                $phone = mysqli_real_escape_string($connect, $_POST['phone']);
                $result = mysqli_query($connect, "INSERT INTO supplier VALUES('$dealer','$email',NULL,'$address','$phone')");
                if(!$result) echo "Dodavanje NIJE uspjelo!";
                else echo "Dodavanje dobavljaca uspjesno!";
            }
            else{
                echo "<form method='post' action='addsupplier.php?success=1'>
                    <table>
                        <tr><td style='padding:5px'>Naziv: </td><td><input name='dealer' type='text' /></td></tr>
                        <tr><td style='padding:5px'>Adresa: </td><td><input name='address' type='text' /></td></tr>
                        <tr><td style='padding:5px'>Telefon: </td><td><input name='phone' placeholder='+385..' type='text' /></td></tr>
                        <tr><td style='padding:5px'>Email: </td><td><input name='email' placeholder='ime@email.com' type='text' /></td></tr>
                        <tr><td style='padding:5px' colspan='2'><input type='submit' value='submit' /></td></tr>
                    </table></form>";
            }
            ?>
        </div>
    </div>
</div>

<?php
require_once("include/footer.php");
?>
