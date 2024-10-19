<?php
$servername = "192.168.0.164";
$database = "registros";
$username = "usuario";
$password = "vital2024.";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$field1 = $conn->real_escape_string($_POST['field1']);
$field2 = $conn->real_escape_string($_POST['field2']);
$field3 = $conn->real_escape_string($_POST['field3']);
$field4 = $conn->real_escape_string($_POST['field4']);

//$field5 = $conn->real_escape_string($_POST['field5']);
//$field6 = $conn->real_escape_string($_POST['field6']);

$query = "INSERT INTO pedidos (NUM_PEDIDO, RUTA, NOMB_EMPLEADO, UNIDADES, FECHA)
            VALUES ('{$field1}','{$field2}','{$field3}','{$field4}',now())";

$conn->query($query);
mysqli_close($conn);
?>





<!DOCTYPE HTML>

<html>
	<head>
		<title>REGISTRO DE PEDIDOS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		
	</head>
	<body class="index is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1 id="logo"><a href="inicio.php">Registro de Pedidos </a></h1>
					<nav id="nav">
						<ul>
							<li class="current"><a class="button primary" href="inicio.php">Inicio</a></li>
							<li class="submenu">
								<a href="#">Menú</a>
								<ul>
									
									<li><a href="registrar_ruta.html">Registrar Ruta</a></li>
									<li><a href="consultar_pedido.html">Consultar Pedido</a></li>
									<li><a href="mejor_desp.html">Despachador Destacado</a></li>
									<li><a href="inicio.php">Inicio</a></li>
									
								</ul>
							</li>
							
						</ul>
					</nav>
				</header>



			<!-- Main -->
				
<section id="banner">				
						
<Table>						
   <tr> 
  <td> PEDIDO REGISTRADO </td>
  </tr>
</Table>	
<img class="image0" src="images/LOGO.JPG" width="200" height="200">
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

	</body>
</html>