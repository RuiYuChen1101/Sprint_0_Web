<?php
//Si la petición es de metodo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    //Cojo los datos que me ha enviado
    $data = json_decode(file_get_contents("php://input"), true);

    //Compruebo que existe datos en dentro y lo guardo en las variables
    if (isset($data['id']) && isset($data['temperatura']) && isset($data['co2'])&& isset($data['latitud'])&& isset($data['longitud'])) {
        $id = $data['id'];
        $temperatura = $data['temperatura'];
        $co2 = $data['co2'];
        $latitud = $data['latitud'];
        $longitud = $data['longitud'];

        require_once 'connection.php';
    
        //Hago que query y sugún el resultado lo respondo con el objecto success
        $sql ="INSERT INTO medicion (`id`, `temperatura`, `co2`, `latitud`, `longitud`) VALUES ('$id','$temperatura','$co2','$latitud','$longitud')";
            if(mysqli_query($conn,$sql)){
                $result["success"] ="1";
                $result["message"] ="success";

                echo json_encode($result);
                mysqli_close($conn);
            }
            else{
                $result["success"] ="0";
                $result["message"] ="error";

                echo json_encode($result);
                mysqli_close($conn);
            }

        error_log("Received POST data: id=$id,temperatura=$temperatura, co2=$co2, latitud=$latitud, longitud=$longitud");


        $result = [
            "success" => "1",
            "message" => "Datos recibidos y procesados correctamente."
        ];
    } else {
        //Si no existe datos en dentro, respondo con success=0
        $result = [
            "success" => "0",
            "message" => "Datos faltantes en la solicitud."
        ];
    }

    
    header('Content-Type: application/json');
    echo json_encode($result);
} else {
   
    //Si el metodo no es POST, respondo tambien con success=0 y un mensaje de error
    $result = [
        "success" => "0",
        "message" => "Método de solicitud no válido."
    ];

    header('Content-Type: application/json');
    echo json_encode($result);
}
    
?>
