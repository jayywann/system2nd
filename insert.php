<?php
// Include the database connection file
include 'connect.php'; // Make sure this file connects to your database

if (isset($_POST['submit'])) {
    // Retrieve form data
    $Name = $_POST['Name'];
    $Jobsite = $_POST['Jobsite'];
    $Evaluated = $_POST['Evaluated'];
    $Confirmation = $_POST['Confirmation'];
    $Email = $_POST['Email'];
    $Recieved = $_POST['Recieved'];
    $Evaluator = $_POST['Evaluator'];
    $Note = $_POST['Note'];

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO direct (Name, Jobsite, Evaluated, Confirmation, Email, Recieved, Evaluator, Note) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("ssssssss", $Name, $Jobsite, $Evaluated, $Confirmation, $Email, $Recieved, $Evaluator, $Note);

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