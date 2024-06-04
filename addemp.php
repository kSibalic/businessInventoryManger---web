<?php 
	require_once("include/header.php");
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
?>
<div id="body">
	<?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
		<h1><span>Dodaj zaposlenika:</span></h1>
        <div id="data">Popis svih zaposlenika <a style="text-decoration:none" href="viewlist.php?list=employee">OVDJE</a><br /><br />
	<?php
	   if(isset($_GET['third'])&&isset($_POST['user'])){
		   $user_result=mysqli_query($connect,"INSERT INTO login VALUES('{$_POST['user']}',md5('{$_POST['password']}'),NULL,{$_POST['admin']})");
		   if(!$user_result){
               echo "Dodavanje NIJE uspjelo! " . mysqli_error($connect);
               //header("Location:addemp.php");
	   		}
	   		else echo"Uspjesno dodavanje zaposlenika!";
	   }
	   else if(isset($_GET['third'])) echo "Nemate pristup ovoj stranici. Vratit se na <a href='addemp.php'></a>";
	   //second page
	   if(isset($_GET['second'])&&isset($_POST['fname'])){
		   
	   		$result = mysqli_query($connect,"INSERT INTO employee VALUES('{$_POST['fname']}','{$_POST['lname']}',NULL,{$_POST['salary']},{$_POST['pnum']},'{$_POST['address']}',{$_POST['uid']},'{$_POST['jdate']}','{$_POST['bdate']}',{$_POST['perks']},{$_POST['admin']})");
	   //page 2 form
	   $empidset = mysqli_query($connect,"SELECT id FROM employee where uid='{$_POST['uid']}'");
	   $empid=mysqli_fetch_array($empidset);
	   echo"<form method='post' action='addemp.php?third=1'>
	   		<table>
	   		<tr><td style='padding:5px'>Ime:</td>
			<td><input type='text' name='user' /></td></tr>
			<tr><td style='padding:5px'>Lozinka:</td>
			<td><input type='password' name='password' /></td></tr>
			<input type='hidden' name='admin' value='{$_POST['admin']}' />
			<input type='hidden' name='id' value='{$empid[0]}' />
			<tr><td colspan='2' style='padding:5px'><input type='submit' value='Spremi' /></td></tr>
			</table>
			</form>";
	   if(!$result)echo "Dodavanje NIJE uspjelo!";
	   else echo"Uspjesno dodavanje zaposlenika!";
	
	   }
	   
	   else if(isset($_GET['second'])) echo "Nemate pristup ovoj stranici. Vratit se na <a href='addemp.php'></a>";
	   else {
		   $time = date("Y-m-d");
		echo"<form method='post' action='addemp.php?second=1'>
        	<table>
            	<tr><td style='padding:5px'>Ime:</td>
                    <td><input type='text' name='fname' /></td></tr>               
                <tr><td style='padding:5px'>Prezime:</td>
                    <td><input type='text' name='lname' /></td></tr>";
																	
					echo"</datalist>
						</td></tr> 
                 <tr><td style='padding:5px'>Placa:</td>
                 <td><input type='text' name='salary' /></td></tr>
                 <tr><td style='padding:5px'>Broj telefona:</td>
                 <td><input type='text' placeholder='385..' name='pnum' /></td></tr>
                 <tr><td style='padding:5px'>Adresa:</td>
                 <td><input type='text' name='address' /></td></tr>
                 <tr><td style='padding:5px'>OIB:</td>
                 <td><input type='text' name='uid' /></td></tr>
                 <tr><td style='padding:5px'>Dob:</td>
                 <td><input type='text' name='bdate' placeholder='YYYY-MM-DD' /></td></tr>
                 
				 <input type='hidden' name='jdate' value='{$time}' />
				           
                 <input type='hidden' name='perks' value='0'/>
				 <tr><td style='padding:5px'>Je li admin?</td><td><select name='admin'>
				 	<option value='1'>Je</option>
					<option value='0'>Nije</option>
					</select></td></tr>
                 <tr><td colspan='2'><input type='submit' name='submit' value='Spremi' /></td></tr>
        </table></form>";
	   }
		?>
       
         </div>
    </div>
</div>

<?php 
	require_once("include/footer.php");
?>