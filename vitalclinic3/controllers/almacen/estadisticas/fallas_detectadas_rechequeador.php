<?php
    include "../../../models/almacen/estadisticas/fallas_detectadas_rechequeador.php";

    class FallasDetectadasRechequeador{
        
        private static $instance = null;
        private $model = null;
        // Constructor privado para evitar instanciación externa
        private function __construct() {
            $this->model = new FallasDetectadasRechequeadorModel();
        }

        // Método para obtener la instancia de la conexión
        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new FallasDetectadasRechequeador();
            }
            return self::$instance;
        }

        private function jsonResponse($data, $error = []) {
            echo json_encode([
                "data" => $data,
                "error" => $error,
            ]);
            exit; // Termina la ejecución después de enviar la respuesta
        }

        public function calcular_total_fallas_detectadas($array){
            $total_fallas = 0;
            foreach($array as $item){
                $total_fallas = $total_fallas + (int) $item['fallas_detectadas'];
            }
            return $total_fallas;
        }

        public function calcular_porc_fallas($array_fallas_detectadas){
            $array_fallas_detectadas_por_rechequeador = [];

            foreach($array_fallas_detectadas as $item){

                
                    $id_rechequeador = $item['id_despachador'];

                    $cantidad_unidades = (int)$this->distribuir_cantidad_unidades($i['cantidad_unidades'],$count_partes_pedido);

                    // Verifica si la clave ya existe en el array agrupado
                    if (!isset($array_pedidos_por_despachador[$id_despachador])) {
                        // Si no existe, inicializa con el objeto actual
                        //Asignar porcentaje del pedido al despachador correspondient
                        $nombre = $i['nombre'] . " " . $i['apellido'];
                        $array_pedidos_por_despachador[$id_despachador] = [
                            "pedidos"=>round($porcentaje_pedido_por_despachador,2), 
                            "cantidad_unidades" => $cantidad_unidades,
                            "nombre_despachador" => $nombre,
                            "porc_pedidos" => round((($porcentaje_pedido_por_despachador / $total_pedidos) * 100),2),
                            "porc_unidades" => round((($cantidad_unidades / $total_unidades) * 100),3), 
                        ];
                    } else {
                        // Si existe, agrega el objeto actual al array existente
                        //Incrementar porcentaje de pedidos al despachador correspondiente
                        $array_pedidos_por_despachador[$id_despachador]['pedidos'] = round($array_pedidos_por_despachador[$id_despachador]['pedidos'] + $porcentaje_pedido_por_despachador,2);
                        //Incrementar porcentaje de unidades al despachador correspondiente
                        $array_pedidos_por_despachador[$id_despachador]['cantidad_unidades'] = round($array_pedidos_por_despachador[$id_despachador]['cantidad_unidades'] + $cantidad_unidades,2); 
                        //Incrementar porcentaje de pedidos con respecto al total de pedidos al despachador correspondiente
                        $array_pedidos_por_despachador[$id_despachador]['porc_pedidos'] = round((($array_pedidos_por_despachador[$id_despachador]['pedidos'] / $total_pedidos) * 100),2);
                        //Incrementar porcentaje de unidades con respecto al total de unidades al despachador correspondiente
                        $array_pedidos_por_despachador[$id_despachador]['porc_unidades'] = round((($array_pedidos_por_despachador[$id_despachador]['cantidad_unidades'] / $total_unidades) * 100),3);
                    }
                
            }
        }

        public function extraer_estadisticas( $fechaI="", $fechaF=""){
            $data = $this->model->extraer_estadisticas($fechaI,$fechaF);
            
            if(count($data) > 0){
                $f = $this->calcular_total_fallas_detectadas($data);
                return $this->jsonResponse($f,[]);
            }else{
                return $this->jsonResponse([],['no hay pedidos']);
            }
            
        }
    }

    // Enrutador
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_GET['extraer_pedidos'])) {
      FallasDetectadasRechequeador::getInstance()->extraer_estadisticas($_POST['fechai'], $_POST['fechaf']);
    }

    // Otros endpoints...
}

// Manejo de errores global
set_exception_handler(function ($e) {
    echo json_encode(["error" => ["Ha ocurrido un error: " . $e->getMessage()]]);
    exit;
});