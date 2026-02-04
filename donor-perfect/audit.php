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
  <meta charset="UTF-8">
  <title>Audit Logs | Donor Perfect</title>
  <style>
    body { margin:0; font-family:Arial, Helvetica, sans-serif; background:#f4f6f9; }
    header { background:#0f766e; color:white; padding:15px 30px; display:flex; justify-content:space-between; }
    nav a { color:white; margin-left:20px; text-decoration:none; font-weight:bold; }
    .container { padding:30px; max-width:1100px; margin:auto; }
    h2 { color:#0f766e; }
    table { width:100%; border-collapse:collapse; background:white; box-shadow:0 2px 6px rgba(0,0,0,0.1); }
    th, td { padding:12px; border-bottom:1px solid #ddd; text-align:left; }
    th { background:#e6f4f1; }
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
  <h2>System Audit Logs</h2>

  <table>
    <thead>
      <tr>
        <th>Action</th>
        <th>User</th>
        <th>Description</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>

<?php
$sql = "SELECT * FROM audit_logs ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['action']}</td>";
    echo "<td>{$row['user']}</td>";
    echo "<td>{$row['description']}</td>";
    echo "<td>{$row['created_at']}</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='4'>No audit logs found</td></tr>";
}
?>

    </tbody>
  </table>
</div>

</body>
</html>
