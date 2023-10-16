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

//Si el metodo es GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //Cojo los valores 
    $response = array();
    $temperatura = $_GET['temperatura'];
    $co2 = $_GET['co2'];

    //Hago el query
    $query = "SELECT * FROM medicion WHERE temperatura = $temperatura AND co2 = $co2"; 
    $result = mysqli_query($conn, $query);

    if ($result) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        mysqli_close($conn);
        
        //Segun si obtengo resultado en el array, respondo con mensaje success
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
        //No puedo hacer query
        $response['error'] = 'Error al buscar datos en la base de datos';
        echo json_encode($response);
    }
} else {
    //No me ha petido con el método GET
    http_response_code(405);
    echo json_encode(array('error' => 'Método de solicitud no válido'));
}

?>
