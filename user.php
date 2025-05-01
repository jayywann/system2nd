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
        header("Location: display.php");
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
        <form method="post" action=" "> <!-- Change action to your PHP file -->
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="Name" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Jobsite</label>
                <input type="text" class="form-control" placeholder="Enter Jobsite" name="Jobsite" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Evaluated</label>
                <input type="text" class="form-control" placeholder="Enter Evaluated" name="Evaluated" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Confirmation</label>
                <input type="text" class="form-control" placeholder="Enter Confirmation" name="Confirmation" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Enter Email" name="Email" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Recieved</label>
                <input type="text" class="form-control" placeholder="Enter Recieved" name="Recieved" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Evaluator</label>
                <input type="text" class="form-control" placeholder="Enter Evaluator" name="Evaluator" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Note</label>
                <input type="text" class="form-control" placeholder="Enter Note" name="Note" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button class="btn btn-secondary">
            <a href="directhire.php" class="text-light text-decoration-none">Cancel</a>
        </button>
        </form>
    </div>
</body>

</html>