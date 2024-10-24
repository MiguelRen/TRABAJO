<?php
    require_once '../../../connection/connection.php';


    class PedidosPorDespachadorModel extends Connection{

        private $conn;

        public function __construct(){
            $this->conn = self::getInstance()->getConnection();
        }

        public function extraer_pedidos($fechaI="", $fechaF="", $empleado=""):array{

            $sql = "SELECT 
            COUNT(pedidos_d_r_e.id_despachador) as cantidad_pedidos, 
            SUM(pedidos.cantidad_unidades) as cantidad_unidades, 
            COUNT(fallas_despachador.id) as cantidad_fallas, 
            nombre as nombre_despachador, 
            apellido as apellido_despachador 
            FROM `pedidos_d_r_e` 
            INNER JOIN pedidos on pedidos_d_r_e.id_pedido=pedidos.id_pedido 
            LEFT JOIN fallas_despachador on pedidos_d_r_e.id=fallas_despachador.id_pedido_d_r_e 
            INNER JOIN empleados on pedidos_d_r_e.id_despachador=empleados.id  
            WHERE pedidos.fecha BETWEEN '$fechaI' AND  '$fechaF' AND pedidos_d_r_e.id_despachador = '$empleado'";

            $result = $this->conn->query($sql);
            // Devolver los resultados como un array JSON
            $data = array();
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
    
            return $data;
        }
    }