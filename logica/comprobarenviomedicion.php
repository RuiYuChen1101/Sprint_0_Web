<?php

// ---------------------------------------------------------------
//
// GET http://localhost/comprobarenviomedicion.php?temperatura=$temperatura&co2=$co2
//
// @return
//      success: Texto
//      message: Texto     
//
// ---------------------------------------------------------------
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = array();
    $temperatura = $_GET['temperatura'];
    $co2 = $_GET['co2'];

    $query = "SELECT * FROM medicion WHERE temperatura = $temperatura AND co2 = $co2"; 

    $result = mysqli_query($conn, $query);

    if ($result) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        mysqli_close($conn);

        if (count($data) > 0) {
            $response["success"] = "success";
            $response["message"] = "Comprobación verificada";
        } else {
            $response["success"] = "no success";
            $response["message"] = "Comprobacion no verificada";
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response['error'] = 'Error al buscar datos en la base de datos';
        echo json_encode($response);
    }
} else {
    http_response_code(405);
    echo json_encode(array('error' => 'Método de solicitud no válido'));
}

?>
