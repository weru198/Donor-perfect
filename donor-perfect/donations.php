<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}
include 'db.php';
?>

<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Donation Tracking | Donor Perfect</title>
  <style>
    body { margin:0; font-family:Arial, Helvetica, sans-serif; background:#f4f6f9; }
    header { background:#0f766e; color:white; padding:15px 30px; display:flex; justify-content:space-between; align-items:center; }
    nav a { color:white; margin-left:20px; text-decoration:none; font-weight:bold; }
    .container { padding:30px; max-width:1100px; margin:auto; }
    h2 { color:#0f766e; }
    table { width:100%; border-collapse:collapse; background:white; box-shadow:0 2px 6px rgba(0,0,0,0.1); }
    table th, table td { padding:12px; border-bottom:1px solid #ddd; text-align:left; }
    table th { background:#e6f4f1; }
    footer { margin-top:40px; text-align:center; color:#555; }
  </style>
</head>
<body>
<header>
  <h1>Donor Perfect</h1>
  <nav>
  <a href="index.php">Dashboard</a>
  <a href="campaigns.php">Campaigns</a>
  <a href="donations.php">Donations</a>
  <a href="audit.php">Audit Logs</a>
  <a href="logout.php">Logout</a>

</nav>

</header>

<div class="container">
  <h2>Donation Tracking</h2>
  <h2>Add Donation</h2>

<form method="POST" action="save_donation.php">

  <label>Donor Name</label>
  <input type="text" name="donor_name" required>

 <label>Campaign</label>
<select name="campaign_id" required>
  <option value="">-- Select Campaign --</option>

  <?php
  if (!isset($conn)) {
    echo "<option>DB not connected</option>";
  } else {
    $result = mysqli_query($conn, "SELECT id, title FROM campaigns");

    if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='{$row['id']}'>{$row['title']}</option>";
      }
    }
  }
  ?>
</select>


  <label>Amount (KES)</label>
  <input type="number" name="amount" required>

  <label>Payment Method</label>
  <select name="payment_method">
    <option>M-Pesa</option>
    <option>Bank Transfer</option>
  </select>

  <button type="submit">Save Donation</button>
</form>
  <h2>Recent donations</h2>
  <table>
    <thead>
      <tr>
        <th>Donor Name</th>
        <th>Campaign</th>
        <th>Amount (KES)</th>
        <th>Payment Method</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT donations.*, campaigns.title AS campaign 
        FROM donations 
        JOIN campaigns ON donations.campaign_id = campaigns.id
        ORDER BY donated_at DESC";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>{$row['donor_name']}</td>";
  echo "<td>{$row['campaign']}</td>";
  echo "<td>KES " . number_format($row['amount']) . "</td>";
  echo "<td>{$row['payment_method']}</td>";
  echo "<td>{$row['status']}</td>";
  echo "<td>{$row['donated_at']}</td>";
  echo "</tr>";
}
?>

</tbody>
  </table>
</div>

<footer>
  <p>© 2026 Donor Perfect | Donation Tracking</p>
</footer>
<script src="script.js"></script>

</body>
</html>
