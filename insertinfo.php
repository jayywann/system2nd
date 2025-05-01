<?php
// Include the database connection file
include 'connect.php'; // Make sure this file connects to your database

if (isset($_POST['submit'])) {
    // Retrieve form data
    $last_name = $_POST['last_name'];
    $given_name = $_POST['given_name'];
    $middle_name = $_POST['middle_name'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $destination = $_POST['destination'];
    $type = $_POST['type'];
    $time_in1 = $_POST['time_in1'];
    $time_out1 = $_POST['time_out1'];
    $total_pc1 = $_POST['total_pc1'];
    $time_in2 = $_POST['time_in2'];
    $time_out2 = $_POST['time_out2'];
    $total_pc2 = $_POST['total_pc2'];

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO info ( last_name, given_name, middle_name, sex, address, destination, type,
        time_in1, time_out1, total_pc1, time_in2, time_out2, total_pc2
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("ssssssss",  $last_name, $given_name, $middle_name, $sex, $address, $destination, $type,
    $time_in1, $time_out1, $total_pc1, $time_in2, $time_out2, $total_pc2);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data Inserted Successfully";
    } else {
        echo "Error: " . $stmt->error; // Display error if execution fails
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$con->close();
?>