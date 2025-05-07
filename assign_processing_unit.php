<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'safefood';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$harvest_id = $_POST['harvest_id'];
$unit_id = $_POST['unit_id'];

// Insert into mapping table
$sql = "INSERT INTO harvest_processing_mapping (harvest_id, processing_unit_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $harvest_id, $unit_id);

if ($stmt->execute()) {
    echo "<script>alert('Harvest successfully assigned to processing unit.'); window.location.href='New_Farm_manager.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
