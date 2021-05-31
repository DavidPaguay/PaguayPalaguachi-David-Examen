<?php 

	include "../confi/conexionBD.php";
	$sql = "SELECT * FROM autor ";
	$result = $conn->query($sql);
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Ingresar Libro</title>
    <script scr="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="select2/select2.min.css">
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="select2/select2.min.js"></script>
    <script type="text/javascript" src="./JavaScr/buscar.js"></script>
	<link rel="stylesheet" href="./Css/Crear.css">
	
       
        <script type="text/javascript" src="../../JavaScr/validacion.js"></script>

        <style type="text/css">
            .error {
            color: red;
            }
        </style>
</head>
<body>

<header id="header">
        <h1><b>FAST MOBILE</b></h1>

        <H2><b>NO GAME NO LIFE</b></H2>
    </header>



    

    <nav id="menu1">

        <ul><li type="none">

        <a id="Inicio" href="./home.php"> Home</a>
        <a href="./index.php"> Agregar Libro</a>

        <label id="nombres"></label>

     

        </li>     
    </ul>           
    </nav>

	<form id="formulario01" >
            <br>
            <h3>INGRESE LA INFORMACION DEL LIBRO</h3>
            <label id="label" for="Nombre">Nombre :</label>
            <input type="text" style="width: 302px;" id="nombrel" name="nombrel" value="" placeholder="Ingrese el nombre" onkeypress="return validarLetras(this)" />
           
            <label for="isbn"> ISBN :</label>
            <input type="text" style="width: 290px;" id="isbn" name="isbn" value="" placeholder="Ingrese el codigo ISBN" onkeypress="return validarLetras(this)" />
            
            <label for="numero_paginas">Numero Paginas :</label>
            <input type="text" style="width: 100px;" id="numero_paginas" name="numero_paginas" value="" placeholder="Ingrese el numero de Paginas" />
            <br> <br>
           
            <br><br>
                <input type="button" id="crear" name="crear" value="Aceptar" />
                <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
                <div id="respuesta" style="margin-left:200px"> </div>

    </form>
    <form id="formulario01" >  
            <label for="Autor">AUTOR DEL CAPITULO:</label>
		<select id="controlBuscador" style="width: 150">
			<?php while ($ver=mysqli_fetch_row($result)) {?>

			<option value="<?php echo $ver[0] ?>">
				<?php echo $ver[1] ?>
			</option>

			<?php  }?>
		</select>

		<table style="margin-top: 50px; "> 
                <tr>
                    <th> AUTOR </th>
                    <th> CODIGO AUTOR</th>
                    <th> Nacionalidad</th>
                    <th> Titulo</th>
                    <th> Numero </th>

                </tr>

        <tr>   
            <th> <input type="text" style="width: 300px; text-align: left; border: 1px solid black;" id="nombre" name="nombre" value="" placeholder="Nombre" disabled/></th>
            <th><input type="text" style="width: 100px; border: 1px solid black;" id="codigo" name="codigo" value="" placeholder="Codigo" /></th>
            <th><div id=nacionalidad  style="width: 250px; border: 1px solid black;   min-height: 18px;" disabled> </div>
            
            </th>
        
            <th> <input type="text" style="width: 150px; border: 1px solid black" id="titulo" name="titulo" value="" placeholder="Titulo" /></th>
            <th> <input type="text" style="width: 150px; border: 1px solid black;" id="numero" name="numero" value="" placeholder="Numero" /> </th> 
            <th><input type="button" id="agregar" name="agregar" value="Agregar" ></th>
            <th><input type="reset" id="cancelar" name="cancelar" value="Cancelar" /></th>
            <div id="respuesta2" style="margin-left:200px"> </div>
                
        </tr>
        </table>

		
	</form>
    <footer>
        -----------------------------------------------------------------------<br>
        Derechos reservados &copy; 2021 <br>
        Diseñado por: David Paguay <br>
        Email:  <a id="mail" href="mailto: dapaguay54@outlook.com"> dapaguay54@outlook.com</a> <br>
        Facebook:<a id="mail" href=" https://www.facebook.com/luisdavid.paguaypalaguachi/">  David Paguay</a><br> <br>
        PRACTICA 1 --PROGRAMACION HIPERMEDIAL--
    
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
		document.getElementById('nombre').value=$('#controlBuscador option:selected').html();
		document.getElementById('codigo').value=$('#controlBuscador').val();
		var id=$('#controlBuscador').val();
        //document.write(id);
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"id=" + id,
			success:function(r){
				$('#nacionalidad').html(r);
			}
		});

	
	}
</script>

<script type="text/javascript">
		$(document).ready(function(){

				$('#crear').click(function(){

                    var nombre= document.getElementById('nombrel').value;
                    var isbn= document.getElementById('isbn').value;
                    var numero= document.getElementById('numero_paginas').value;
                    var total="nom=" + nombre + "&isb=" + isbn + "&num=" + numero;
                    //document.write(total);
                    $.ajax({
                        type:"POST",
                        url:"libro.php",
                        data:total,
                        success:function(r){
                           $('#respuesta').html(r);
                        }
                    });
					
				});

		});

</script>
<script type="text/javascript">
		$(document).ready(function(){

				$('#agregar').click(function(){

                    var nombreli= document.getElementById('nombrel').value;
                    var codigoau= document.getElementById('codigo').value;
                    var numero= document.getElementById('numero').value;
                    var titulo= document.getElementById('titulo').value;
                    var total="nombreli=" + nombreli + "&cod=" + codigoau + "&num=" + numero + "&titu="+titulo;
                    //document.write(total);
                    $.ajax({
                        type:"POST",
                        url:"capitulo.php",
                        data:total,
                        success:function(r){
                           $('#respuesta2').html(r);
                        }
                    });
					
				});

		});

</script>


