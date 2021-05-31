<?php 
//var total="nom"+nombre+"&isb"+isb+"&num"+num;
include "../confi/conexionBD.php";
$codigoau=$_POST['cod'];
$titulo=$_POST['titu'];
$numero=$_POST['num'];
$nombreli=$_POST['nombreli'];

//echo " ".$codigoau. " ".$nombreli. " ".$titulo. " ". $numero;

$sql = "SELECT * FROM libro Where li_nombre='$nombreli'";;

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$libroid =$row["li_codigo"];
echo $libroid;
 $sql2 = "INSERT INTO capitulos VALUES (0, '$numero', '$titulo', '$libroid', '$codigoau')";
if($conn->query($sql2) === TRUE){
   
    echo "El capitulo se agrego con exito, puede ingresar uno nuevo";
}else{

    if($conn->errno == 1062){
    echo "<p class='error'>El Capitulo $titulo ya esta registrada en el sistema </p>";
    } 
    else {
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }
}



?>
