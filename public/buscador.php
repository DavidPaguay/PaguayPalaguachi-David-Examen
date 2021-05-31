<link href="./Css/generar.css" rel="stylesheet" type="text/css">
<?php 
include "../confi/conexionBD.php";
$id=$_POST['id'];
$sql="SELECT * from autor where au_codigo=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name= $row['au_nombre'];

$sql2 = "SELECT  l.li_nombre, l.li_isbn, l.li_num_paginas, c.cap_titulo, c.cap_numero, a.au_nombre, a.au_nacionalidad
FROM libro l , autor a, capitulos c 
WHERE a.au_nombre = '$name' and a.au_codigo= c.au_codigo and l.li_codigo= c.li_codigo";
$result2 = $conn->query($sql2);	
?>
  
  <H3 style= "margin-left: 600px">RESULTADO DE BUSQUEDA</H3>
        
        <table id="table1" style="width:100%">
            <tr>
                <th>Libro</th>
                <th>ISBN</th>
                <th>Numero Paginas</th>
                <th>Titulo</th>
                <th>Numero Capitulo</th>
                <th>Autor</th>
                <th>Nacionalidad</th>
            </tr>
            <?php  

                while($row = $result2->fetch_assoc()) {

                echo "<tr>";

                echo " <td>" . $row['li_nombre'] ."</td>";
                echo " <td>" . $row['li_isbn'] . "</td>";
                echo " <td>" . $row['li_num_paginas'] . "</td>";
                echo " <td>" . $row['cap_titulo'] ."</td>";
                echo " <td>" . $row['cap_numero'] . "</td>";
                echo " <td>" . $row['au_nombre'] . "</td>";
                echo " <td>" . $row['au_nacionalidad'] ."</td>";
                
                ;}

            ?>


        </table>
