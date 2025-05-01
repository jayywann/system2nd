<?php
// Include the database connection file
include 'connect.php'; // Ensure this file connects to your database

// Fetch data from the database
$sql = "SELECT * FROM govtogov"; // Adjust the query as needed
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <style>
        /* Set the height of the table to 38% of the viewport height */
        .table-container {
            height: 38vh;
            /* 38% of the viewport height */
            overflow-y: auto;
            /* Enable vertical scrolling if content exceeds the height */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-5">Government To Government</h1>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Control no.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Jobsite</th>
                        <th scope="col">Evaluated</th>
                        <th scope="col">For Confirmation (MWO/PE/PCS)</th>
                        <th scope="col">Email to DHAD</th>
                        <th scope="col">Evaluator</th>
                        <th scope="col">Note</th>
                        <th scope="col">Actions</th> <!-- New column for actions -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are results
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        $no = 1; // Initialize a counter for the "No." column
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $no++ . "</th>"; // Increment the counter
                            echo "<td>" . htmlspecialchars($row['Control']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Jobsite']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Evaluated']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Confirmation']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Evaluator']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Note']) . "</td>";
                            echo "<td>
                                <div class='btn-group' role='group'>
                                    <a href='updategtg.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm mr-2'>Update</a>
                                    <a href='deletegtg.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                                </div>
                              </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div style="position: fixed; bottom: 250px; right: 215  px;">
            <button class="btn btn-primary">
                <a href="usergtg.php" class="text-light text-decoration-none">Add User</a>
            </button>
            <button class="btn btn-primary">
                <a href="goverment.php" class="text-light text-decoration-none">Cancel</a>
            </button>
        </div>
    </div>

    <?php
    // Close the database connection
    $con->close();
    ?>

</body>

</html>