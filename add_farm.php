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

$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $farm_id = $_POST['farm_id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $size = $_POST['size'];
    $owner_info = $_POST['owner_info'];

    // Insert into database
    $sql = "INSERT INTO farms (farm_id, name, location, size, owner_info) 
            VALUES ('$farm_id', '$name', '$location', '$size', '$owner_info')";

    if ($conn->query($sql) === TRUE) {
        $message = "✅ New farm added successfully!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add New Farm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-success">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Add New Farm</span>
  </div>
</nav>

<!-- Form Section -->
<div class="container py-5">
  <h2 class="mb-4 text-center">Farm Registration Form</h2>

  <?php if (!empty($message)): ?>
    <div class="alert alert-info text-center"><?php echo $message; ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label for="farmId" class="form-label">Farm ID</label>
      <input type="text" class="form-control" id="farmId" name="farm_id" placeholder="Enter Farm ID" required>
    </div>

    <div class="mb-3">
      <label for="farmName" class="form-label">Farm Name</label>
      <input type="text" class="form-control" id="farmName" name="name" placeholder="Enter Farm Name" required>
    </div>

    <div class="mb-3">
      <label for="location" class="form-label">Location</label>
      <input type="text" class="form-control" id="location" name="location" placeholder="Enter Farm Location" required>
    </div>

    <div class="mb-3">
      <label for="farmSize" class="form-label">Farm Size</label>
      <input type="text" class="form-control" id="farmSize" name="size" placeholder="e.g., 50 acres" required>
    </div>

    <div class="mb-3">
      <label for="ownerInfo" class="form-label">Owner Info</label>
      <input type="text" class="form-control" id="ownerInfo" name="owner_info" placeholder="Enter Owner Name / Contact" required>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    <a href="farm_manager_dashboard.html" class="btn btn-secondary ms-2">Cancel</a>
  </form>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
  <div class="container">
    <p class="mb-0">© 2025 PureHarvest Safety | All Rights Reserved</p>
  </div>
</footer>

</body>
</html>
