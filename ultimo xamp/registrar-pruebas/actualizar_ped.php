
 <?php


// confirmar sesion

session_start();


if (!isset($_SESSION['loggedin'])) {

    header('Location: login.html');
    exit;
}

?>








<!DOCTYPE HTML>

<html>
	<head>
	<script type="text/javascript">
function handler(event) {
    var response = event.response;
    var headers = response.headers;

    // Set the cache-control header
    headers['cache-control'] = {value: 'public, max-age=63072000'};

    // Return response to viewers
    return response;
}
</script>
	
		<title>REGISTRO DE PEDIDOS</title>
		<meta charset="utf-8" />
	
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" /><link rel="shortcut icon" href="images/icono.jpg" />
		
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>
	<body class="index is-preload" onload="document.getElementById('cursor').focus()" >	<header id="header" class="alt" >
	
		<div id="page-wrapper">

			<!-- Header -->
		<!--<img class="image0" src="images/LOGO.png" width="100" height="100">	   -->
			
						
<table><td>
<div class="dropdown">  <button class="dropbtn">MENÚ</button>
 <div class="dropdown-content">
   <a href="registrar_ruta.php">Registrar Ruta</a>
    <a href="registrar_empleado.php">Registrar Empleado</a>
    <a href="consultar_pedido.php">Consultar Pedido</a>
									<a href="mejor_des.php">Estadisticas</a>
							<a href="pedidos_desp.php">Pedidos x Despachador</a>
							<a href="fallas_desp.php">Fallas x Despachador</a>
								<a href="todos_pedidos.php">Pedidos Por Fecha</a>
							<a href="borrar.php">Borrar Pedido</a>
<a href="inicio.php">Inicio</a>
          
</div>      
</div>
</td><td> <h1 id="logo"><center><a >Actualizar Pedidos </a></center></h1> </td> <td align='right'> 	 <?= $_SESSION['name'] ?> <a href="cerrar-sesion.php" style="color:white;"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión</a>	</td>

 </table> 	
   	

		
		
		
		
		
					
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

$query2="SELECT ID,NOMB_EMPLEADO FROM EMPLEADOS ORDER BY NOMB_EMPLEADO ASC; ";

$consulta2=mysqli_query($conn,$query2);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}   ?>
						<form action="actualizar_pedido.php" method="post">
<Table>						
   <tr> <td class="td0" >NUM_PEDIDO: <input type="text" name = "field1" class="inputb" id="cursor" /></td>
 
  


   
   <td class="td0" > NOMB_EMPLEADO:<br> <select name = "fiel3" autocomplete="on" id="empleado" onchange="ShowSelected();">
   <?php
   while($obj2=mysqli_fetch_array($consulta2)){ ?>
   echo'<option value="'.$obj2[1].'"><?php echo  "$obj2[1]";?></option>';
  
   <?php 
   }
   ?>
  </select> 
   </td>

</Table>	
    <input type="submit" value="ACTUALIZAR" /> 

<BR>	
<BR>
<BR>
<img class="image0" src="images/LOGO.png" width="200" height="200">	

<BR>	<BR>	
<BR>	<BR>	
<BR>	<BR>	
<BR>	<BR>	
<BR>	<BR>	
<BR>	<BR>	
<BR>	<BR>	
<BR>	<BR>	
<BR>	<BR>	
<BR>	<BR>	

<input  class="input0" type="text" name="field3" id="valor_empleado" value="">
</form>
<script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
        if(e.keyCode == 13) {
          e.preventDefault();
        }
      }))
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