<?php
// Include the database connection file
include 'connect.php'; // Ensure this file connects to your database

// Fetch data from the database
$sql = "SELECT * FROM balik"; // Adjust the query as needed
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
        <h1 class="my-5">Balik-Manggagawa</h1>

        <div class="table-container">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Last Name</th>
                        <th>Given Name</th>
                        <th>Middle Name</th>
                        <th>Sex</th>
                        <th>Address</th>
                        <th>Destination</th>
                        <th>Type</th>
                        <th>Time in</th>
                        <th>Time out</th>
                        <th>Total PC</th>
                        <th>Time in</th>
                        <th>Time out</th>
                        <th>Total PC</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['given_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['middle_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['sex']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['destination']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['time_in1']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['time_out1']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['total_pc1']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['time_in2']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['time_out2']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['total_pc2']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='14'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <div style="position: fixed; bottom: 250px; right: 215  px;">
        <button class="btn btn-primary">
            <a href="user.php" class="text-light text-decoration-none">Add User</a>
        </button>
        <button class="btn btn-primary">
            <a href="balikmanggagawa.php" class="text-light text-decoration-none">Cancel</a>
        </button>
    </div>
    </div>

    <?php
    // Close the database connection
    $con->close();
    ?>

</body>

</html>