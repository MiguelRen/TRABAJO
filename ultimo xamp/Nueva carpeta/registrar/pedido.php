



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
									<li><a href="registrar_empleado.html">Registrar Empleado</a></li>
									<li><a href="inicio.php">Inicio</a></li>
									<li><a href="mejor_desp.html">Despachador Destacado</a></li>
									
								</ul>
							</li>
							
						</ul>
					</nav>
				</header>
	
				<section id="banner">				
<form action="pedido.php" method="post">
<Table>						
   <tr> 
   <td> Num_Pedido: <input type="text" name = "buscarpedido" /></td>
  </tr>
</Table>	
    <input type="submit" value="CONSULTAR" />
</form>
<br>
<table class="table table-striped">
  	
		<thead>
		<tr>
			<th>Num_Pedido</th>
			<th>Ruta</th>
			<th>Nomb_Empleado</th>
			<th>Cant_Unidades</th>
			<th>Fecha</th>
		</tr>
		</thead>

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



$buscarpedido = $conn->real_escape_string($_POST['buscarpedido']);

$query = "SELECT * FROM PEDIDOS WHERE NUM_PEDIDO ='$buscarpedido'";



$datos= mysqli_query ($conn,$query);
?>
		
<?php while ($fila =mysqli_fetch_array($datos)){?>
	<td><?php echo $fila [0]; ?></td>
    <td><?php echo $fila [1]; ?></td>
    <td><?php echo $fila [2]; ?></td>
    <td><?php echo $fila [3]; ?></td>
    <td><?php echo $fila [4]; ?></td>
    
	
<?php } ?>
</table>



<BR>	
<BR>	
<BR>	
<img class="image0" src="images/LOGO.JPG" width="200" height="200">
<BR>	<BR><BR><BR><BR>
 
 
 
 
 
 
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