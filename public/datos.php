<?php 
include "../confi/conexionBD.php";
$sql = "SELECT * FROM autor ";
$result = $conn->query($sql);
$continente=$_POST['id'];
//echo $continente;

	$sql="SELECT * 
		from autor
		where au_codigo='$continente'";

	$result = $conn->query($sql);


	while ($ver=mysqli_fetch_row($result)) {

		$cadena=$ver[2];
	}

	echo  $cadena;
	

?>