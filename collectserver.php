<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = isset($_POST['fname']) ? $_POST['fname'] : "";
    $emailaddress = isset($_POST['email']) ? $_POST['email'] : "";
    $mobilenumber = isset($_POST['mobile']) ? $_POST['mobile'] : "";
    $donarmobilenumber = isset($_POST['dmobile']) ? $_POST['dmobile'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";

    // Create a connection to the database
    $conn = mysqli_connect('localhost', 'root', 'swapna@2005', 'pythonproject');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Check if the email already exists in the database
    $check_query = "SELECT emailaddress FROM collect_form WHERE emailaddress = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $emailaddress);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        // Email already registered, show pop-up message
        echo "<script>
                alert('This email is already registered.');
                window.location.href = 'collectForm.html'; // Redirect to collectserver.php
                </script>";
    } else {
        // Prepare the SQL query
        $query = "INSERT INTO collect_form(fullname, emailaddress, mobilenumber, donarmobilenumber,address) VALUES (?, ?,?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind parameters
        $stmt->bind_param("sssss", $fullname, $emailaddress, $mobilenumber,$donarmobilenumber, $address);

        // Execute the query
        if ($stmt->execute()) {
            // Registration successful, show pop-up message
            echo "<script>
                    alert('Requested successfully');
                    window.location.href = 'collectForm.html'; // Redirect to collectserver.php
                    </script>";
        } else {
            echo "Error: " . htmlspecialchars($stmt->error);
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>
