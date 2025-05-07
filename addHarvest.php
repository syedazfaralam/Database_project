<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "safefood";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $harvestLotId = $_POST["harvestId"];
  $origin = $_POST["origin"];
  $variety = $_POST["variety"];
  $harvestDate = $_POST["harvestDate"];
  $certification = $_POST["certification"];

  $sql = "INSERT INTO harvest_info (harvest_lot_id, origin, variety, harvest_date, certification)
          VALUES (?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);

  if ($stmt) {
    $stmt->bind_param("sssss", $harvestLotId, $origin, $variety, $harvestDate, $certification);

    if ($stmt->execute()) {
      echo "<script>alert('Harvest info added successfully!'); window.location.href='addHarvest.php';</script>";
    } else {
      echo "Execute failed: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "SQL prepare failed: " . $conn->error;
  }

  $conn->close();
}
?>

<!-- Frontend Form -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Harvest Info</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 20px;
    }
    .container {
      background: white;
      padding: 30px;
      max-width: 700px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      margin-top: 25px;
      width: 100%;
      background: #28a745;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background: #218838;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Add Harvest Information</h2>
    <form action="addHarvest.php" method="POST">
      <label for="harvestId">Harvest Lot ID:</label>
      <input type="text" id="harvestId" name="harvestId" placeholder="e.g. HL001" required />

      <label for="origin">Origin (Farm Location):</label>
      <input type="text" id="origin" name="origin" placeholder="e.g. Mymensingh, BD" required />

      <label for="variety">Crop Variety:</label>
      <input type="text" id="variety" name="variety" placeholder="e.g. Roma Tomatoes" required />

      <label for="harvestDate">Harvest Date:</label>
      <input type="date" id="harvestDate" name="harvestDate" required />

      <label for="certification">Certification:</label>
      <textarea id="certification" name="certification" rows="3" placeholder="e.g. Organic, GAP Certified, etc."></textarea>

      <button type="submit">Submit Harvest Info</button>
    </form>
  </div>

</body>
</html>
