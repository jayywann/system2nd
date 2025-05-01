<?php
// Include the database connection file
include 'connect.php'; // Ensure this file connects to your database

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement to delete the record
    $stmt = $con->prepare("DELETE FROM direct WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" indicates that the parameter is an integer

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to display.php after successful deletion
        header("Location: display.php?message=Record+deleted+successfully");
        exit(); // Stop further execution
    } else {
        echo "Error deleting record: " . $stmt->error; // Display error if execution fails
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No ID provided for deletion.";
}

// Close the database connection
$con->close();
?>