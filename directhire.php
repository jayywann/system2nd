<?php
include 'connect.php';

// Fetch data from the direct table
$sql = "SELECT * FROM direct";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Direct Hire</title>
  <link rel="stylesheet" href="directhire.css" />
  
</head>

<body>
  <!-- Header -->
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
      <a href="balikmanggagawa.php">Balik-Manggagawa</a>
      <a href="goverment.php">Government to Government</a>
      <a href="info.php">Information Sheet</a>
      <a href="job.html">Job Fair</a>
      <div style="flex-grow: 1;"></div>
      <a href="#">Settings</a>
      <a href="logout.php">Logout</a>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
      <div style="display: flex; align-items: center;">
        <img src="Image/direct.png" alt="Direct Hire Icon" style="width: 100px; height: auto; margin-right: 10px;">
        <span style="font-size: 50px; font-weight: bold;">Direct Hire</span>
      </div>

      <!-- Table Section -->
      <section class="table-section">
        <div class="table-container">
          <table class="table table-bordered status-table">
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
                  echo "<th scope='row'>" . $no++ . "</th>";
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
                            <a href='update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm mr-2'>Update</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                          </div>
                        </td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='10' class='text-center'>No records found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Add User Button -->
      <div style="margin-top: 20px;">
        <a href="user.php" class="btn btn-primary">Add User</a>
      </div>

      <!-- PDF Download and Print Section -->
      <div class="clearance-print-section mt-4">
        <?php
        $docs = [
          ["File/CLEARANCE.docx.pdf", "Clearance"],
          ["clearance.pdf", "Memorandum"],
          ["Image/CRITICAL SKILLS.docx.pdf", "MWO / PE / Consulate Confirmation"],
          ["clearance.pdf", "Checklist of Requirements"],
          ["clearance.pdf", "Screenshots (principal / email / consulate)"],
        ];

        foreach ($docs as $doc) {
          echo '
            <div class="mb-3">
              <a href="' . $doc[0] . '" target="_blank" class="clearance-link">
                <img src="Image/PDF.png" alt="PDF" class="pdf-icon" style="width: 20px; margin-right: 5px;">
                ' . $doc[1] . '
              </a>
              <button onclick="window.open(\'' . $doc[0] . '\')" class="print-button ml-2">Print</button>
            </div>
          ';
        }
        ?>
      </div>

    </main>
  </div>

  <?php $con->close(); ?>
</body>
</html>
