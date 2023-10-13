
<?php

// ---------------------------------------------------------------
//
// GET ../logica/recuperarmedicion.php
//
// error:Texto | (id:Int, temperatura:Double, co2:Double) : devuelto en un mismo JSON
//
// ---------------------------------------------------------------
require_once '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = array();

    $query = "SELECT * FROM medicion";

    $result = mysqli_query($conn, $query);

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
        
        $response['error'] = 'Error fetching data from the database';
        echo json_encode($response);
    }
} else {

    http_response_code(405);
    echo json_encode(array('error' => 'Invalid request method'));
}


?>


