<?php

include '../models/mejor_despachador.php';

class MejorDespachadorController {

  public function mejor_despachador($start_date='', $final_date=''){
    $model = new MejorDespachadorModel();
    $data = $model->mejor_despachador($start_date,$final_date);
    return $data;
  }

  public function estadisticas_negativas_despachador($start_date='', $final_date=''){
    $model = new MejorDespachadorModel();
    $data = $model->estadisticas_negativas_despachador($start_date,$final_date);
    return $data;
  }
}

//Recibimos los datos para extraer las estadisticas
if(isset($_GET['extract_statistic'])){

  // Obtener los datos del formulario
  $start_date = $_POST['start_date'];
  $final_date = $_POST['final_date'];

  $mejor_despachador = new MejorDespachadorController();
  $data_mejor_despachador = $mejor_despachador->extract_statistics($start_date, $final_date);
  $data_fallas_despachador = $mejor_despachador->estadisticas_negativas_despachador($start_date,$final_date);

  echo json_encode([$data_mejor_despachador, $data_fallas_despachador]);
}
