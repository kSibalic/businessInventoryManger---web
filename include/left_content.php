<?php if(isset($_SESSION['username'])){
	echo"<div class='lcontent'>
                <ul class='bmenu'>
                    <li><a href='index.php'>Početna</a></li>
                    <li><a href='settings.php'>Postavke</a></li>";
                    if(isset($_SESSION['admin'])){
						if($_SESSION['admin']!=0){
						echo "<li><a href='addproduct.php'>+ Proizvodi</a></li>
							  <li><a href='addemp.php'>+ Zaposlenici</a></li>
							  <li><a href='addsupplier.php'>+ Dobavljači</a></li>";
						}
					}
    echo"</ul></div>";
} ?>