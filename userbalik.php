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
    $stmt = $con->prepare("INSERT INTO balik (last_name, given_name, middle_name, sex, address, destination, type,
        time_in1, time_out1, total_pc1, time_in2, time_out2, total_pc2
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sssssssssssss", $last_name, $given_name, $middle_name, $sex, $address, $destination, $type,
    $time_in1, $time_out1, $total_pc1, $time_in2, $time_out2, $total_pc2);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: displaybalik.php");
    } else {
        echo "Error: " . $stmt->error; // Display error if execution fails
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$con->close();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Table</title>
</head>

<body>
    <div class="container my-5">
    <form method="post" action="">
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label>Given Name</label>
        <input type="text" class="form-control" placeholder="Enter Given Name" name="given_name" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label>Middle Name</label>
        <input type="text" class="form-control" placeholder="Enter Middle Name" name="middle_name" autocomplete="off">
    </div>

    <div class="form-group">
        <label>Sex</label>
        <select class="form-control" name="sex" required>
            <option value="" disabled selected>Select Sex</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>

    <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" placeholder="Enter Address" name="address" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label>Destination</label>
        <input type="text" class="form-control" placeholder="Enter Destination" name="destination" autocomplete="off">
    </div>

    <div class="form-group">
        <label>Type</label>
        <input type="text" class="form-control" placeholder="Enter Type" name="type" autocomplete="off">
    </div>

    <div class="form-group">
        <label>Time In 1</label>
        <input type="datetime-local" class="form-control" name="time_in1">
    </div>

    <div class="form-group">
        <label>Time Out 1</label>
        <input type="datetime-local" class="form-control" name="time_out1">
    </div>

    <div class="form-group">
        <label>Total PC 1</label>
        <input type="number" class="form-control" name="total_pc1" min="0">
    </div>

    <div class="form-group">
        <label>Time In 2</label>
        <input type="datetime-local" class="form-control" name="time_in2">
    </div>

    <div class="form-group">
        <label>Time Out 2</label>
        <input type="datetime-local" class="form-control" name="time_out2">
    </div>

    <div class="form-group">
        <label>Total PC 2</label>
        <input type="number" class="form-control" name="total_pc2" min="0">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <a href="displaybalik.php" class="btn btn-secondary">Cancel</a>
</form>

    </div>
</body>

</html>