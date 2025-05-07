<?php
// Database credentials
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'safefood';

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch farm records
$sql = "SELECT * FROM farms";
$result = $conn->query($sql);

// Fetch harvest records
$sql_harvest = "SELECT * FROM harvest_info";
$result_harvest = $conn->query($sql_harvest);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Farm Manager Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<!-- Navbar/Header -->
<nav class="navbar navbar-dark bg-success">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Farm Manager Dashboard</span>
  </div>
</nav>

<!-- Hero Section -->
<section class="py-5 bg-success text-white text-center">
  <div class="container">
    <h1 class="display-5">Welcome, Farm Manager</h1>
    <p class="lead">Manage farm details and monitor harvests</p>
  </div>
</section>

<!-- Main Container -->
<div class="container py-5">

  <!-- Farm Info -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Farm Information</h3>
    <a href="add_farm.php" class="btn btn-success">+ Add New Farm</a>
  </div>

  <div class="table-responsive new">
    <table class="table table-bordered table-hover table-light text-center">
      <thead class="table-success">
        <tr>
          <th>Farm ID</th>
          <th>Name</th>
          <th>Location</th>
          <th>Farm Size</th>
          <th>Owner Info</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo htmlspecialchars($row['farm_id']); ?></td>
              <td><?php echo htmlspecialchars($row['name']); ?></td>
              <td><?php echo htmlspecialchars($row['location']); ?></td>
              <td><?php echo htmlspecialchars($row['size']); ?></td>
              <td><?php echo htmlspecialchars($row['owner_info']); ?></td>
              <td>
              <a href="update_farm.php?farm_id=<?php echo $row['farm_id']; ?>" class="btn btn-warning btn-sm">Update</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="6">No farm data found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Harvest Section -->
<div class="d-flex justify-content-between align-items-center my-4">
  <h3>Harvest Details</h3>
  <a href="addharvest.html" class="btn btn-success">+ Add Harvest Info</a>
</div>

<div class="table-responsive harvest">
  <table class="table table-bordered table-hover text-center">
    <thead class="table-success">
      <tr>
        <th>HarvestLot ID</th>
        <th>Origin</th>
        <th>Variety</th>
        <th>Harvest Date</th>
        <th>Certification</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result_harvest->num_rows > 0): ?>
        <?php while($row = $result_harvest->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['harvest_lot_id']); ?></td>
            <td><?php echo htmlspecialchars($row['origin']); ?></td>
            <td><?php echo htmlspecialchars($row['variety']); ?></td>
            <td><?php echo htmlspecialchars($row['harvest_date']); ?></td>
            <td><?php echo htmlspecialchars($row['certification']); ?></td>
            <td>
              <a href="select_cold_storage.html" class="btn btn-outline-success mb-1">Send to Cold Storage</a><br>
              <a href="select_processing_unit.php?harvest_id=<?php echo $row['id']; ?>" class="btn btn-danger mb-1">Send to Processing</a>
              <a href="update_harvest.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm mt-1">Update</a>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="6">No harvest data found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <div class="container">
    <p class="mb-0">© 2025 PureHarvest Safety | All Rights Reserved</p>
  </div>
</footer>

</body>
</html>

<?php
$conn->close();
?>
