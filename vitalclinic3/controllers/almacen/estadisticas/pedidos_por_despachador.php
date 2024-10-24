<?php
    include "../../../models/almacen/estadisticas/pedidos_por_despachador.php";

    class PedidosPorDespachador{
        
        private static $instance = null;
        private $model = null;
        // Constructor privado para evitar instanciación externa
        private function __construct() {
            $this->model = new PedidosPorDespachadorModel();
        }

        // Método para obtener la instancia de la conexión
        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new PedidosPorDespachador();
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

        public function extraer_pedidos( $fechaI="", $fechaF="", $empleado=""){
            $data = $this->model->extraer_pedidos($fechaI,$fechaF,$empleado);

            if(count($data) > 0){
                return $this->jsonResponse($data,[]);
            }else{
                return $this->jsonResponse([],['no hay pedidos']);
            }
            
        }

        public function extraer_detalles_pedidos(){

        }
    }

    // Enrutador
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_GET['extraer_pedidos'])) {
      PedidosPorDespachador::getInstance()->extraer_pedidos($_POST['fechai'], $_POST['fechaf'], $_POST['empleado']);
    }

    // Otros endpoints...
}

// Manejo de errores global
set_exception_handler(function ($e) {
    echo json_encode(["error" => ["Ha ocurrido un error: " . $e->getMessage()]]);
    exit;
});