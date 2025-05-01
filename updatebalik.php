<?php
// Include the database connection file
include 'connect.php'; // Ensure this file connects to your database

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current record data
    $stmt = $con->prepare("SELECT * FROM balik WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the record exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit();
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No ID provided for update.";
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Prepare the SQL statement to update the record
   // Prepare the SQL statement to update the record
$stmt = $con->prepare("UPDATE balik SET 
last_name = ?, given_name = ?, middle_name = ?, sex = ?, address = ?, 
destination = ?, type = ?, time_in1 = ?, time_out1 = ?, total_pc1 = ?, 
time_in2 = ?, time_out2 = ?, total_pc2 = ? 
WHERE id = ?");

$stmt->bind_param("sssssssssssssi", 
$last_name, $given_name, $middle_name, $sex, $address, 
$destination, $type, $time_in1, $time_out1, $total_pc1, 
$time_in2, $time_out2, $total_pc2, $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to display.php after successful update
        header("Location: display.php?message=Record+updated+successfully");
        exit(); // Stop further execution
    } else {
        echo "Error updating record: " . $stmt->error; // Display error if execution fails
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h1 class="my-5">Update User Data</h1>
        <form method="POST" action="">
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
    </div>
    <div class="form-group">
        <label for="given_name">Given Name</label>
        <input type="text" class="form-control" name="given_name" value="<?php echo htmlspecialchars($row['given_name']); ?>" required>
    </div>
    <div class="form-group">
        <label for="middle_name">Middle Name</label>
        <input type="text" class="form-control" name="middle_name" value="<?php echo htmlspecialchars($row['middle_name']); ?>" required>
    </div>
    <div class="form-group">
        <label for="sex">Sex</label>
        <select class="form-control" name="sex" required>
            <option value="Male" <?php if ($row['sex'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if ($row['sex'] == 'Female') echo 'selected'; ?>>Female</option>
        </select>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($row['address']); ?>" required>
    </div>
    <div class="form-group">
        <label for="destination">Destination</label>
        <input type="text" class="form-control" name="destination" value="<?php echo htmlspecialchars($row['destination']); ?>" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" name="type" value="<?php echo htmlspecialchars($row['type']); ?>" required>
    </div>
    <div class="form-group">
        <label for="time_in1">Time In 1</label>
        <input type="datetime-local" class="form-control" name="time_in1" value="<?php echo htmlspecialchars($row['time_in1']); ?>">
    </div>
    <div class="form-group">
        <label for="time_out1">Time Out 1</label>
        <input type="datetime-local" class="form-control" name="time_out1" value="<?php echo htmlspecialchars($row['time_out1']); ?>">
    </div>
    <div class="form-group">
        <label for="total_pc1">Total PC 1</label>
        <input type="number" step="1" class="form-control" name="total_pc1" value="<?php echo htmlspecialchars($row['total_pc1']); ?>">
    </div>
    <div class="form-group">
        <label for="time_in2">Time In 2</label>
        <input type="datetime-local" class="form-control" name="time_in2" value="<?php echo htmlspecialchars($row['time_in2']); ?>">
    </div>
    <div class="form-group">
        <label for="time_out2">Time Out 2</label>
        <input type="datetime-local" class="form-control" name="time_out2" value="<?php echo htmlspecialchars($row['time_out2']); ?>">
    </div>
    <div class="form-group">
        <label for="total_pc2">Total PC 2</label>
        <input type="number" step="1" class="form-control" name="total_pc2" value="<?php echo htmlspecialchars($row['total_pc2']); ?>">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="displaybalik.php" class="btn btn-secondary">Cancel</a>
</form>

    </div>

</body>

</html>