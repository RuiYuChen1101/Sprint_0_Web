<?php
// Include your database connection
require_once '../../connection.php';

// Check if it's a GET request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = array();

    // Query to select data from the 'medicion' table
    $query = "SELECT * FROM medicion";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch the rows and store them in an array
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }

        // Close the database connection
        mysqli_close($conn);

        // Set the response header to indicate JSON content
        header('Content-Type: application/json');

        // Encode the response array as JSON and send it
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


