<?php
include 'connect.php'; // your database connection

// Fetch data from the govtogov table
$sql = "SELECT * FROM govtogov";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Government To Government</title>
  <link rel="stylesheet" href="goverment.css" />
</head>

<body>
  <header>
    <img src="Image/DMW.png" alt="DMW Logo">
    <div class="header-text">
      <span class="country">Republic of the Philippines</span>
      <span class="department">Department of Migrant Workers</span>
    </div>
  </header>

  <div class="container">
    <!-- Sidebar -->
    <nav class="sidebar">
      <h2>DMW System</h2>
      <a href="homepage.html">Home</a>
      <a href="directhire.php">Direct Hire</a>
      <a href="balikmanggagawa.html">Balik-Manggagawa</a>
      <a href="goverment.php">Government to Government</a>
      <a href="info.html">Information Sheet</a>
      <a href="job.html">Job Fair</a>
      <div style="flex-grow: 1;"></div>
      <a href="#">Settings</a>
      <a href="logout.php">Logout</a>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
      <div style="display: flex; align-items: center; margin-bottom: 20px;">
        <img src="Image/government.png" alt="DMW Logo" style="width: 100px; height: auto; margin-right: 10px;">
        <span style="font-size: 50px; font-weight: bold;">Government To Government</span>
      </div>

      <section class="table-section">
        <div class="table-container">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Control no.</th>
                <th>Name</th>
                <th>Jobsite</th>
                <th>Evaluated</th>
                <th>For Confirmation (MWO/PE/PCS)</th>
                <th>Email to DHAD</th>
                <th>Evaluator</th>
                <th>Note</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $no++ . "</td>";
                  echo "<td>" . htmlspecialchars($row['Control']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Jobsite']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Evaluated']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Confirmation']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Evaluator']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Note']) . "</td>";
                  echo "<td>
                          <a href='update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Update</a>
                          <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
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
      </section>

      <!-- Add User Button -->
      <div style="margin-top: 20px;">
        <a href="usergtg.php" class="btn btn-success">Add User</a>
      </div>

      <!-- PDF and Print Section -->
      <div class="clearance-print-section" style="margin-top: 30px;">
        <a href="clearance.pdf" target="_blank" class="btn btn-outline-secondary">
          <img src="Image/PDF.png" alt="PDF" style="height: 20px; margin-right: 5px;"> Endorsement Letter
        </a>
        <button onclick="window.print()" class="btn btn-secondary">Print</button>
      </div>
    </main>
  </div>

  <?php $con->close(); ?>
</body>
</html>
