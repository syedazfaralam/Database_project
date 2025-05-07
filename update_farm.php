<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'safefood';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$farm_id = $_GET['farm_id'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farm_id = $_POST['farm_id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $size = $_POST['size'];
    $owner_info = $_POST['owner_info'];

    $update_sql = "UPDATE farms SET name='$name', location='$location', size='$size', owner_info='$owner_info' WHERE farm_id='$farm_id'";
    if ($conn->query($update_sql) === TRUE) {
        $message = "✅ Farm updated successfully!";
    } else {
        $message = "❌ Update error: " . $conn->error;
    }
}

// Fetch current data
$sql = "SELECT * FROM farms WHERE farm_id='$farm_id'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $farm = $result->fetch_assoc();
} else {
    die("Farm not found!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Update Farm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-warning">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Update Farm Info</span>
  </div>
</nav>

<div class="container py-5">
  <h2 class="mb-4 text-center">Edit Farm Details</h2>

  <?php if (!empty($message)): ?>
    <div class="alert alert-info text-center"><?php echo $message; ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <input type="hidden" name="farm_id" value="<?php echo $farm['farm_id']; ?>">

    <div class="mb-3">
      <label class="form-label">Farm ID</label>
      <input type="text" class="form-control" value="<?php echo $farm['farm_id']; ?>" disabled>
    </div>

    <div class="mb-3">
      <label class="form-label">Farm Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $farm['name']; ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Location</label>
      <input type="text" class="form-control" name="location" value="<?php echo $farm['location']; ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Size</label>
      <input type="text" class="form-control" name="size" value="<?php echo $farm['size']; ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Owner Info</label>
      <input type="text" class="form-control" name="owner_info" value="<?php echo $farm['owner_info']; ?>" required>
    </div>

    <button type="submit" class="btn btn-warning">Update</button>
    <a href="new_farm_manager.php" class="btn btn-secondary ms-2">Back to Dashboard</a>
  </form>
</div>

</body>
</html>
