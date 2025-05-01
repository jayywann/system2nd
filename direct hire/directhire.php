<?php
include 'connect.php'; // your database connection

// Fetch data from the table (e.g., balikmanggagawa table)
$sql = "SELECT * FROM direct"; // use your correct table name
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Balik Manggagawa</title>
  <link rel="stylesheet" href="info.css" />

</head>

</script>

<header>
  <img src="Image/DMW.png" alt="DMW Logo">
  <div class="header-text">
    <span class="country">Republic of the Philippines</span>
    <span class="department">Department of Migrant Workers</span>
  </div>
</header>

<body>
  <div class="container">
    <!-- Sidebar -->
    <nav class="sidebar">
      <h2>DMW System</h2>
      <a href="homepage.html">Home</a>
      <a href="directhire.html">Direct Hire</a>
      <a href="balikmanggagawa.html">Balik-Manggagawa</a>
      <a href="goverment.html">Government to Government</a>
      <a href="info.html">Information Sheet</a>
      <a href="job.html">Job Fair</a>
      <h1> </h1>
      <h1> </h1>
      <h1> </h1>
      <h1> </h1>
      <h1> </h1>
      <h1> </h1>
      <a href="#">Settings</a>
      <a href="logout.php">Logout</a>

    </nav>

    <!-- Main Content -->
    <main class="main-content">
      <div style="display: flex; align-items: center;">
        <img src="Image/direct.png" alt="DMW Logo" style="width: 100px; height: auto; margin-right: 10px;">
        <span style="font-size: 50px; font-weight: bold;">Direct Hire</span>
      </div>

      <section class="requirement-section">
      </section>

      <section class="table-section">
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
                                    <a href='update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm mr-2'>Update</a>
                                    <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
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
      </section>
      <div style="position; bottom: 250px; right: 215  px;">
        <button class="btn btn-primary">
          <a href="user.php" class="text-light text-decoration-none">Add User</a>
        </button>
      </div>
  </div>

  <?php
  // Close the database connection
  $con->close();
  ?>

  <div class="clearance-print-section">
    <a href="File/CLEARANCE.docx.pdf" target="_blank" class="clearance-link">
      <img src="Image/PDF.png" alt="PDF" class="pdf-icon">
      Clearance
    </a>

    <a href="File/CLEARANCE.docx.pdf" target="_blank">
      <button class="print-button">Print</button>
    </a>
  </div>

  <div class="clearance-print-section">
    <a href="clearance.pdf" target="_blank" class="clearance-link">
      <img src="Image/PDF.png" alt="PDF" class="pdf-icon">
      Memorandum
    </a>
    <button onclick="window.print()" class="print-button">
      Print
    </button>
  </div>
  <div class="clearance-print-section">
    <a href="Image/CRITICAL SKILLS.docx.pdf" target="_blank" class="clearance-link">
      <img src="Image/PDF.png" alt="PDF" class="pdf-icon">
      Migrant Workers Office/ Philippines Embassy/ Philippines Consulate Confirmation
    </a>
    <button onclick="window.print()" class="print-button">
      Print
    </button>
  </div>
  <div class="clearance-print-section">
    <a href="clearance.pdf" target="_blank" class="clearance-link">
      <img src="Image/PDF.png" alt="PDF" class="pdf-icon">
      Checklist of Requirements
    </a>
    <button onclick="window.print()" class="print-button">
      Print
    </button>
  </div>
  <div class="clearance-print-section">
    <a href="clearance.pdf" target="_blank" class="clearance-link">
      <img src="Image/PDF.png" alt="PDF" class="pdf-icon">
      Screenshots (principal /email of migrant workers/Consulate)
    </a>
    <button onclick="window.print()" class="print-button">
      Print
    </button>
  </div>
  </main>
  </div>
</body>

</html>