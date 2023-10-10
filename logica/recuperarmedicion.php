<?php
// Include your database connection
require_once '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = array();

    // Query to select data from the 'medicion' table
    $query = "SELECT * FROM medicion";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch the rows and store them in an array under the "data" key
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        // Close the database connection
        mysqli_close($conn);

        $response["data"] = $data;
        $response["success"] = "1";
        $response["message"] = "success";
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // If there's an error in the query, send an error response
        $response['error'] = 'Error fetching data from the database';
        echo json_encode($response);
    }
} else {
    // If the request method is not GET, respond with a "405 Method Not Allowed" status code
    http_response_code(405);
    echo json_encode(array('error' => 'Invalid request method'));
}


?>


