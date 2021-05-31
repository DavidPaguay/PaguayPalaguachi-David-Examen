<?php 

	include "../confi/conexionBD.php";
	$sql = "SELECT * FROM autor ";
	$result = $conn->query($sql);
	$sql2 = "SELECT * FROM libro ";
	$result2 = $conn->query($sql2);
 ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="select2/select2.min.css">
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="select2/select2.min.js"></script>

	<meta charset="utf-8" language="es"> 
        <TITLE>Agenda </TITLE>
        
        <link href="./Css/Home.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="../../JavaScr/validacion.js"></script>
        <script type="text/javascript" src="../../JavaScr/buscar.js"></script>

</head>
<body>
<header id="header">
        <h1><b>TU BIBLIOTECA VIRTUAL<b></h1>

        <H2><b>AL ALCANCE DE TU MANO</b></H2>
    </header>

    <nav id="menu1">

        <ul><li type="none">

		<select id="controlBuscador" style="width: 300px">
			<?php while ($ver=mysqli_fetch_row($result)) {?>

			<option value="<?php echo $ver[0] ?>">
				<?php echo $ver[1] ?>
			</option>

			<?php  }?>
		</select>

		<a id="Inicio" href="./home.php"> Home</a>
        <a href="./index.php"> Agregar Libro</a>

        <label id="nombres"></label>
        </li>     
    </ul>           
    </nav>
	<br>
        <div id="informacion"><b></b></div>
    <br>
    <br>
    <br>

    <Section id="cont">
        <H3 style= "margin-left: 600px">TODOS LOS LIBROS</H3>
        <table id="table" style="width:100%">
            <tr>
                <th>Libro</th>
                <th>ISBN</th>
                <th>Numero Paginas</th>
            </tr>
            <?php  

                while($row = $result2->fetch_assoc()) {

                echo "<tr>";

                echo " <td>" . $row['li_nombre'] ."</td>";
                echo " <td>" . $row['li_ISBN'] . "</td>";
                echo " <td>" . $row['li_num_paginas'] . "</td>";}

            ?>


        </table>

    </Section>
    <footer>
        -----------------------------------------------------------------------<br>
        Derechos reservados &copy; 2021 <br>
        Diseñado por: David Paguay <br>
        Email:  <a id="email" href="mailto: dapaguay54@outlook.com"> dapaguay54@outlook.com</a> <br>
        Facebook:<a id="email" href=" https://www.facebook.com/luisdavid.paguaypalaguachi/">  David Paguay</a><br> <br>
       EXAMEN INTERCICLO --PROGRAMACION HIPERMEDIAL--
    
    </footer>



</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#controlBuscador').select2();
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#controlBuscador').select2();
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#controlBuscador').val();
		recargarLista();

		$('#controlBuscador').change(function(){
			recargarLista();
            var id=$('#controlBuscador').val();
            var nom=$('#controlBuscador option:selected').html();
 
		});
	})
</script>

<script type="text/javascript">
	function recargarLista(){
		var id=$('#controlBuscador').val();
        //document.write(id);
		$.ajax({
			type:"POST",
			url:"buscador.php",
			data:"id=" + id,
			success:function(r){
				$('#informacion').html(r);
			}
		});

	
	}
</script>