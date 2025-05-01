<?php
// Include the database connection file
include 'connect.php'; // Ensure this file connects to your database

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current record data
    $stmt = $con->prepare("SELECT * FROM govtogov WHERE id = ?");
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
    $Name = $_POST['Name'];
    $Jobsite = $_POST['Jobsite'];
    $Evaluated = $_POST['Evaluated'];
    $Confirmation = $_POST['Confirmation'];
    $Email = $_POST['Email'];
    $Recieved = $_POST['Recieved'];
    $Evaluator = $_POST['Evaluator'];
    $Note = $_POST['Note'];

    // Prepare the SQL statement to update the record
    $stmt = $con->prepare("UPDATE govtogov SET Name = ?, Jobsite = ?, Evaluated = ?, Confirmation = ?, Email = ?, Recieved = ?, Evaluator = ?, Note = ? WHERE id = ?");
    $stmt->bind_param("ssssssssi", $Name, $Jobsite, $Evaluated, $Confirmation, $Email, $Recieved, $Evaluator, $Note, $id);

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
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="Name" name="Name"
                    value="<?php echo htmlspecialchars($row['Name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Jobsite">Jobsite</label>
                <input type="text" class="form-control" id="Jobsite" name="Jobsite"
                    value="<?php echo htmlspecialchars($row['Jobsite']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Evaluated">Evaluated</label>
                <input type="text" class="form-control" id="Evaluated" name="Evaluated"
                    value="<?php echo htmlspecialchars($row['Evaluated']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Confirmation">For Confirmation (MWO/PE/PCS)</label>
                <input type="text" class="form-control" id="Confirmation" name="Confirmation"
                    value="<?php echo htmlspecialchars($row['Confirmation']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" id="Email" name="Email"
                    value="<?php echo htmlspecialchars($row['Email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Recieved">Recieved</label>
                <input type="text" class="form-control" id="Recieved" name="Recieved"
                    value="<?php echo htmlspecialchars($row['Recieved']); ?>" required>
            </div>
            <div class=" <div class=" form-group">
                <label for="Evaluator">Evaluator</label>
                <input type="text" class="form-control" id="Evaluator" name="Evaluator"
                    value="<?php echo htmlspecialchars($row['Evaluator']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Note">Note</label>
                <textarea class="form-control" id="Note" name="Note" rows="3"
                    required><?php echo htmlspecialchars($row['Note']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="goverment.php" class="btn btn-secondary">Cancel</a>
        </form> 
    </div>

</body>

</html>