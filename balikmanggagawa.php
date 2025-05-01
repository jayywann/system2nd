<?php
include 'connect.php';

// Fetch data from the balik table
$sql = "SELECT * FROM balik";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Balik Manggagawa</title>
  <link rel="stylesheet" href="balikmanggagawa.css" />
  <!-- Optional: Include Bootstrap if needed -->
 
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
      <a href="balikmanggagawa.php">Balik-Manggagawa</a>
      <a href="goverment.php">Government to Government</a>
      <a href="info.html">Information Sheet</a>
      <a href="job.html">Job Fair</a>
      <a href="#">Settings</a>
      <a href="logout.php">Logout</a>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
      <div style="display: flex; align-items: center;">
        <img src="Image/balik.png" alt="Balik Manggagawa" style="width: 100px; height: auto; margin-right: 10px;">
        <span style="font-size: 50px; font-weight: bold;">Balik-Manggagawa</span>
      </div>

      <section class="requirement-section">
        <div class="section">
          <label for="location" class="dropdown-label">Location</label>
          <select id="location" class="dropdown">
            <option>Calamba</option>
            <option>One stop shop Service Office (OSSCO) Cavite</option>
          </select>
        </div>
      </section>

      <section class="table-section">
        <div class="table-wrapper">
          <table class="status-table table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Last Name</th>
                <th>Given Name</th>
                <th>Middle Name</th>
                <th>Sex</th>
                <th>Address</th>
                <th>Destination</th>
                <th>Type</th>
                <th>Time In 1</th>
                <th>Time Out 1</th>
                <th>Total PC 1</th>
                <th>Time In 2</th>
                <th>Time Out 2</th>
                <th>Total PC 2</th>
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
                  echo "<td>
                          <div class='btn-group' role='group'>
                            <a href='updatebalik.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm mr-1'>Update</a>
                            <a href='deletebalik.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                          </div>
                        </td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='15' class='text-center'>No records found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Add User Button -->
      <div style="margin-top: 20px;">
        <a href="userbalik.php" class="btn btn-primary">Add User</a>
      </div>

      <!-- Clearance Buttons -->
      <div class="clearance-print-section">
        <a href="Image/CRITICAL SKILLS.docx.pdf" target="_blank" class="clearance-link">
        <img src="Image/PDF.png" alt="PDF" class="pdf-icon" style="width: 20px; margin-right: 5px;"> Clearance
        </a>
        <a href="File/CRITICAL SKILLS.docx.pdf" target="_blank">
          <button class="print-button">Print</button>
        </a>
      </div>

      <?php
      $titles = [
        "Watch listed employer\\company",
        "Non-complaint country",
        "For Assessment country",
        "Seafarers position",
        "Critical Skill"
      ];
      foreach ($titles as $title) {
        echo '
        <div class="clearance-print-section">
          <a href="clearance.pdf" target="_blank" class="clearance-link">
            <img src="Image/PDF.png" alt="PDF" class="pdf-icon" style="width: 20px; margin-right: 5px;">' . $title . '
          </a>
          <button onclick="window.print()" class="print-button">Print</button>
        </div>';
      }
      ?>
    </main>
  </div>
</body>
</html>
