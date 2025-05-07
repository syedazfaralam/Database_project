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

// Get the harvest ID from query parameter
$harvest_id = isset($_GET['harvest_id']) ? $_GET['harvest_id'] : null;

// Fetch processing units
$sql = "SELECT * FROM processing_units";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Select Processing Unit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="mb-4">Select a Processing Unit for Harvest ID: <?php echo htmlspecialchars($harvest_id); ?></h2>
  <table class="table table-bordered text-center">
    <thead class="table-success">
      <tr> 
        <th>Unit ID</th>
        <th>Location</th>
        <th>Type of Processing</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['unit_id']); ?></td>
            <td><?php echo htmlspecialchars($row['location']); ?></td>
            <td><?php echo htmlspecialchars($row['type']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td>
              <form method="POST" action="assign_processing_unit.php" style="display:inline;">
                <input type="hidden" name="harvest_id" value="<?php echo $harvest_id; ?>">
                <input type="hidden" name="unit_id" value="<?php echo $row['unit_id']; ?>">
                <button type="submit" class="btn btn-warning text-white">Select</button>
              </form>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="5">No processing units available.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
