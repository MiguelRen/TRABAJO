
<?php
include "./string.php";



function extraerNumerosDeSeisDigitos($strData) {
    // global $strData;
    // Expresión regular para encontrar números de 6 dígitos consecutivos
    $pattern = '/(\b\d{6}\b)/';
    
    // Extraer todos los números de la cadena
    preg_match_all($pattern,  $strData, $todosLosNumeros);
    
    // Filtrar solo los números de 6 dígitos
    $numerosValidos = array_filter($todosLosNumeros[0], function($numero) {
        return strlen($numero) == 6 && ctype_digit($numero);
    });
    
    // Retornar los números válidos como una cadena
    return implode("','", $numerosValidos);
}

// Ejemplo de uso


// $newCadena =$strData;
// echo $strData;

$resultado = extraerNumerosDeSeisDigitos($strData);
echo  "'".$resultado."'";

