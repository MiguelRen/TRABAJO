<!DOCTYPE HTML>

<html>
	<head>
		<title>REGISTRO DE PEDIDOS</title>
		<meta charset="utf-8" />
	
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>
	<body class="index is-preload">	<header id="header" class="alt">
		<div id="page-wrapper">

			<!-- Header -->
		<!--<img class="image0" src="images/LOGO.JPG" width="100" height="100">	   -->
			
						
					<h1 id="logo"><a href="inicio.php">Registro de Pedidos </a></h1> <br>
		
					
					<nav id="nav">
						<ul>
							<li class="current"><a class="button primary" href="inicio.php">Inicio</a></li>
							<li class="submenu">
								<a href="#">Menú</a>
								<ul>
									<li><a href="registrar_ruta.html">Registrar Ruta</a></li>
									<li><a href="registrar_empleado.html">Registrar Empleado</a></li>
									<li><a href="consultar_pedido.html">Consultar Pedido</a></li>
									<li><a href="mejor_desp.html">Despachador Destacado</a></li>
								
								</ul>
							</li>
							
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">

					<!--
						".inner" is set up as an inline-block so it automatically expands
						in both directions to fit whatever's inside it. This means it won't
						automatically wrap lines, so be sure to use line breaks where
						appropriate (<br />).
					-->
					
<?php
$servername = "192.168.0.164";
$database = "registros";
$username = "usuario";
$password = "vital2024.";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
$query="SELECT ID,RUTA FROM RUTAS ORDER BY RUTA ASC; ";
$query2="SELECT ID,NOMB_EMPLEADO FROM EMPLEADOS ORDER BY NOMB_EMPLEADO ASC; ";
$consulta=mysqli_query($conn,$query);
$consulta2=mysqli_query($conn,$query2);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}   ?>
						<form action="index.php" method="post">
<Table>						
   <tr> <td>NUM_PEDIDO: <input type="text" name = "field1" /></td>
   <td> RUTA:<br> 
  
   <select name = "fiel2" autocomplete="on" id="ruta" onchange="ShowSelected();">
   <?php
   while($obj=mysqli_fetch_array($consulta)){ ?>
   echo'<option value="'.$obj[1].'"><?php echo  "$obj[1]";?></option>';
   
   <?php 
   }
   ?>
  </select> 
   </td>
   
   <td> NOMB_EMPLEADO:<br> <select name = "fiel3" autocomplete="on" id="empleado" onchange="ShowSelected();">
   <?php
   while($obj2=mysqli_fetch_array($consulta2)){ ?>
   echo'<option value="'.$obj2[1].'"><?php echo  "$obj2[1]";?></option>';
  
   <?php 
   }
   ?>
  </select> 
   </td>
   <td> UNIDADES: <input type="text" name = "field4" /> </td></tr>
</Table>	
    <input type="submit" value="REGISTRAR" /> 

<BR>	
<BR>
<BR>
<img class="image0" src="images/LOGO.JPG" width="200" height="200">		
<BR>	<BR>	
<input  class="input0"  type="text" name="field2" id="valor_ruta" value="">
<input  class="input0" type="text" name="field3" id="valor_empleado" value="">
</form>

<script type="text/javascript">
$("#ruta").change(function() {
  var valor = $(this).val(); // Capturamos el valor del select
  var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado

  $("#id_ruta").val(valor);
  $("#valor_ruta").val(texto);
});
</script>





<script type="text/javascript">
$("#empleado").change(function() {
  var valor = $(this).val(); // Capturamos el valor del select
  var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado

  $("#id_empleado").val(valor);
  $("#valor_empleado").val(texto);
});
</script>
				</section>

		
				

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</body>
</html>