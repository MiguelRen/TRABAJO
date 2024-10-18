



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
									<li><a href="consultar_pedido.html">Consultar Pedido</a></li>
									<li><a href="inicio.php">Inicio</a></li>
									
								</ul>
							</li>
							
						</ul>
					</nav>
				</header>
	
				<section id="banner">				
<form action="mejor_desp.php" method="post">
 Inicio: <input type="datetime-local" name = "desp" />
  Fin: <input type="datetime-local" name = "desp2" />	
    <br>  <br><br><input type="submit" value="CONSULTAR" />
</form>
<br>
<table class="table table-striped">
  	
		<thead>
		<tr>
			<th>Nomb_Empleado</th>
			<th>Cant_Pedidos</th>
			<th>Cant_Unidades</th>
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



$desp = $conn->real_escape_string($_POST['desp']);
$desp2 = $conn->real_escape_string($_POST['desp2']);


$query = "SELECT NOMB_EMPLEADO,
COUNT(NOMB_EMPLEADO) AS MAYOR_VOTADO, # Obtenemos el candidato y su repetición
SUM(UNIDADES) AS UNIDADES_T
FROM pedidos
WHERE fecha BETWEEN '$desp' AND '$desp2'

GROUP BY NOMB_EMPLEADO # Agrupamos los resultados por el nombre
ORDER BY UNIDADES_T DESC # Ordenamos los resultados por el contador de forma descendiente
LIMIT 3";



$datos= mysqli_query ($conn,$query);
?>
		
<?php while ($fila =mysqli_fetch_array($datos)){?>
	<tr>
	<td><?php echo $fila [0]; ?></td>
    <td><?php echo $fila [1]; ?></td>
    <td><?php echo $fila [2]; ?></td> 
	</tr>
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