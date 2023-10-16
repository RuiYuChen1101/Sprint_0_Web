
<?php

// ---------------------------------------------------------------
//
// GET ../logica/recuperarmedicion.php
//
// error:Texto | (id:Int, temperatura:Double, co2:Double) : devuelto en un mismo JSON
//
// ---------------------------------------------------------------
require_once 'connection.php';

//Si el metodo es GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = array();

    //Hago el query
    $query = "SELECT * FROM medicion";
    $result = mysqli_query($conn, $query);

    //Si existe resultado en dentro de array data, respondo con el array data y success=1
    if ($result) {
       
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        mysqli_close($conn);

        $response["data"] = $data;
        $response["success"] = "1";
        $response["message"] = "success";
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        //No hay resultado, respondo con un mensaje
        $response['message'] = 'No hay datos en db';
        echo json_encode($response);
    }
} else {

    http_response_code(405);
    echo json_encode(array('error' => 'Invalid request method'));
}


?>


