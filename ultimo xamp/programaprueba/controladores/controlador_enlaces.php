<?php
    class ControladorEnlaces{
        public function redireccion():void{

            //se verifica si hay alguna accion
            if (isset ($_GET["action"])){
                
                $enlace = $_GET["action"];
            }
            else{
                $enlace = "";
            } 
            
            session_start();

            $_SESSION["vari"] = "fkjghdjhfj";
        }

    }
?>