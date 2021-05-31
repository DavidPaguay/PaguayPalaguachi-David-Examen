<?php 

include "../confi/conexionBD.php";
$nombre=$_POST['nom'];
$isbn=$_POST['isb'];
$numero=$_POST['num'];


//$sql = "SELECT * FROM libro Where li_nombre='$nombre'";
//$result = $conn->query($sql);
$sql = "INSERT INTO libro VALUES (0, '$nombre', '$isbn', '$numero')";
//echo "El Libeo se agrego con exito, por favor no modificar los campos";
if($conn->query($sql) === TRUE){

    //$sql = "INSERT INTO libro VALUES (0, '$nombre', '$isbn', '$numero')";
    //$result = $conn->query($sql);
    echo "El Libeo se agrego con exito, por favor no modificar los campos";
}else{ 

if($conn->errno == 1062){
    echo "<p class='error'>El libro $nombre ya esta registrada en el sistema </p>";
    } 
    else {
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }

}

?>
