<?php
$servername = "localhost";
$username = "root";
$password = ""; // or your DB password
$database = "safefood"; // replace with your DB

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Processing Unit Dashboard | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f5f5f5;
    }
    .section-title {
      margin-top: 40px;
      margin-bottom: 10px;
      color: #198754;
      font-weight: 600;
    }
    .table thead {
      background-color: #198754;
      color: white;
    }
    .form-heading {
      font-size: 16px;
      font-weight: 600;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .btn-add {
      font-size: 14px;
      padding: 5px 10px;
      margin-left: 10px;
    }
    .form-section {
      background-color: #fff;
      padding: 15px;
      border-radius: 8px;
      border: 1px solid #ddd;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin_panel.html">← Back to Admin Dashboard</a>
  </div>
</nav>

<div class="container mt-4">
  <div class="text-center mb-4">
    <h2 class="text-success fw-bold">Processing Unit Dashboard</h2>
    <p class="text-muted">Manage processing units, shipments, and food batches</p>
  </div>

  <!-- 1. Registered Processing Units -->
  <h4 class="section-title">📍 Registered Processing Units</h4>
  
  <!-- Form -->
  <div class="form-section">
    <div class="form-heading">+ Add Info</div>
    <form>
      <div class="row g-2">
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Processing Unit ID" required />
        </div>
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Name" required />
        </div>
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Location" required />
        </div>
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Contact" required />
        </div>
      </div>
      <div class="mt-3 text-end">
        <button class="btn btn-success">Submit</button>
      </div>
    </form>
  </div>

  <!-- Table -->
  <div class="table-responsive mb-5">
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>Processing Unit ID</th>
          <th>Name</th>
          <th>Location</th>
          <th>Contact</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>PU001</td>
          <td>GreenFoods Processing Plant</td>
          <td>Gazipur, Dhaka</td>
          <td>01700-123456</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- 2. Processing Shipments -->
  <h4 class="section-title">🚚 Processing Shipments</h4>

  <!-- Form -->
  <div class="form-section">
    <div class="form-heading">+ Add Info</div>
    <form>
      <div class="row g-2">
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Shipment ID" required />
        </div>
        <div class="col-md-3">
          <input type="datetime-local" class="form-control" placeholder="Pickup DateTime" required />
        </div>
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Quantity Sent" required />
        </div>
        <div class="col-md-3">
          <input type="datetime-local" class="form-control" placeholder="Delivery DateTime" required />
        </div>
      </div>
      <div class="mt-3 text-end">
        <button class="btn btn-success">Submit</button>
      </div>
    </form>
  </div>

  <!-- Table -->
  <div class="table-responsive mb-5">
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>Shipment ID</th>
          <th>Pickup Date & Time</th>
          <th>Quantity Sent</th>
          <th>Delivery Date & Time</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>PS101</td>
          <td>2025-04-18 09:00 AM</td>
          <td>400 kg</td>
          <td>2025-04-18 01:30 PM</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- 3. Processed Food Batches -->
  <h4 class="section-title">🍱 Processed Food Batches</h4>

  <!-- Form -->
  <div class="form-section">
    <div class="form-heading">+ Add Info</div>
    <form>
      <div class="row g-2">
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Batch Number" required />
        </div>
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Processed Food Name" required />
        </div>
        <div class="col-md-3">
          <input type="date" class="form-control" placeholder="Completion Date" required />
        </div>
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Quantity Processed" required />
        </div>
      </div>
      <div class="mt-3 text-end">
        <button class="btn btn-success">Submit</button>
      </div>
    </form>
  </div>

  <!-- Table -->
  <div class="table-responsive mb-5">
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>Batch Number</th>
          <th>Processed Food Name</th>
          <th>Completion Date</th>
          <th>Quantity Processed</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>BATCH-A01</td>
          <td>Mango Pulp (Puree)</td>
          <td>2025-04-19</td>
          <td>300 kg</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


 <!-- 4. Requests Section -->
 <h4 class="section-title">📝 Requests</h4>

<?php
$sql = "SELECT hpm.harvest_id, hpm.processing_unit_id, 
               hi.harvest_lot_id, hi.origin, hi.variety, hi.harvest_date, hi.certification,
               pu.location, pu.type, pu.status
        FROM harvest_processing_mapping hpm
        JOIN harvest_info hi ON hpm.harvest_id = hi.id
        JOIN processing_units pu ON hpm.processing_unit_id = pu.unit_id";
$result = $conn->query($sql);
?>

<?php if ($result->num_rows > 0): ?>
  <div class="table-responsive mb-5">
    <table class="table table-bordered text-center align-middle">
      <thead class="table-success">
        <tr>
          <th>Harvest Lot ID</th>
          <th>Origin</th>
          <th>Variety</th>
          <th>Harvest Date</th>
          <th>Certification</th>
          <th>Processing Unit Location</th>
          <th>Type</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['harvest_lot_id']) ?></td>
            <td><?= htmlspecialchars($row['origin']) ?></td>
            <td><?= htmlspecialchars($row['variety']) ?></td>
            <td><?= htmlspecialchars($row['harvest_date']) ?></td>
            <td><?= htmlspecialchars($row['certification']) ?></td>
            <td><?= htmlspecialchars($row['location']) ?></td>
            <td><?= htmlspecialchars($row['type']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td><button class="btn btn-sm btn-success">Assign Barcodes</button></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <p class="text-muted">No pending requests found.</p>
<?php endif; ?>







<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <div class="container">
    <p class="mb-0">© 2025 PureHarvest Safety | Admin Panel</p>
  </div>
</footer>

</body>
</html>
