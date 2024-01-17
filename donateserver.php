<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = isset($_POST['fname']) ? $_POST['fname'] : "";
    $emailaddress = isset($_POST['email']) ? $_POST['email'] : "";
    $mobilenumber = isset($_POST['mobile']) ? $_POST['mobile'] : "";
    $foodquantity = isset($_POST['fquantity']) ? $_POST['fquantity'] : "";
    $totalquantity = isset($_POST['tquantity']) ? $_POST['tquantity'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";

    // Check if any of the required fields are empty
    if (empty($fullname) || empty($emailaddress) || empty($mobilenumber) || empty($foodquantity) || empty($totalquantity) || empty($address)) {
        echo "Please fill out all required fields.";
    } else {
        // Create a connection to the database
        $conn = mysqli_connect('localhost', 'root', 'swapna@2005', 'pythonproject');
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Check if email already exists in the database
        $check_query = "SELECT emailaddress FROM donate_form WHERE emailaddress = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("s", $emailaddress);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            // Email already registered, trigger JavaScript alert
            echo "<script>
                    alert('This email is already registered.');
                    window.location.href = 'donateform.html'; // Redirect to the form page
                  </script>";
            exit();
        }

        // Prepare the SQL query for insertion
        $insert_query = "INSERT INTO donate_form(fullname, emailaddress, mobilenumber, foodquantity, totalquantity, address) VALUES (?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);

        if ($insert_stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind parameters for insertion
        $insert_stmt->bind_param("ssssss", $fullname, $emailaddress, $mobilenumber, $foodquantity, $totalquantity, $address);

        // Execute the insertion query
        if ($insert_stmt->execute()) {
            // Show pop-up message and redirect to the same page
            echo "<script>
                    alert('Donated Successful!');
                    window.location.href = 'donateform.html'; // Redirect to the form page
                  </script>";
            exit();
        } else {
            echo "Error: " . htmlspecialchars($insert_stmt->error);
        }

        // Close the statements and the connection
        $check_stmt->close();
        $insert_stmt->close();
        $conn->close();
    }
}
?>
