<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $emailaddress = isset($_POST['email']) ? $_POST['email'] : "";

    // Create a connection to the database
    $conn = mysqli_connect('localhost', 'root', 'swapna@2005', 'pythonproject');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Check if the email already exists in the donate_form table
    $check_query = "SELECT emailaddress FROM donate_form WHERE emailaddress = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $emailaddress);
    $check_stmt->execute();
    $check_stmt->store_result();

    $response = array();

    if ($check_stmt->num_rows > 0) {
        // Email already registered in donate_form
        $response['valid'] = true;
    } else {
        // Email not found
        $response['valid'] = false;
    }

    // Close the connection
    $conn->close();

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>
