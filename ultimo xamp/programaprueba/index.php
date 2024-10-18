<?php
// se requiere el archivo del controlador  de la instancia de la clase  controladora d ela plantilla
require_once("./controladores/plantilla.php");

//se instancia la plantilla

$nuevaplantilla = new ControladorPlantilla();
//se ejecuta el método plantilla
 $nuevaplantilla -> plantilla();

