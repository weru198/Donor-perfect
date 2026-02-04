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
  <title>Campaign Management | Donor Perfect</title>

  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: #f4f6f9;
    }
    header {
      background: #0f766e;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    nav a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-weight: bold;
    }
    .container {
      padding: 30px;
      max-width: 1100px;
      margin: auto;
    }
    h2 {
      color: #0f766e;
    }
    form {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      margin-bottom: 40px;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input, textarea, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      margin-top: 20px;
      padding: 12px 20px;
      background: #0f766e;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 15px;
    }
    button:hover {
      background: #115e59;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    table th, table td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    table th {
      background: #e6f4f1;
    }
    footer {
      margin-top: 40px;
      text-align: center;
      color: #555;
    }
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

  <!-- CREATE CAMPAIGN -->
  <h2>Create New Campaign</h2>

  <form method="POST" action="save_campaign.php">

    <label>Campaign Title</label>
    <input type="text" name="title" placeholder="e.g. Flood Relief Support" required>

    <label>Campaign Description</label>
    <textarea name="description" rows="4" required></textarea>

    <label>Target Amount (KES)</label>
    <input type="number" name="target_amount" required>

    <label>Campaign Category</label>
    <select name="category">
      <option>Medical</option>
      <option>Education</option>
      <option>Disaster Relief</option>
      <option>Community Support</option>
    </select>

    <label>End Date</label>
    <input type="date" name="end_date" required>

    <button type="submit">Create Campaign</button>
  </form>

  <!-- DISPLAY CAMPAIGNS -->
  <h2>Active Campaigns</h2>

  <table>
    <thead>
      <tr>
        <th>Campaign Name</th>
        <th>Target (KES)</th>
        <th>Collected (KES)</th>
        <th>Status</th>
        <th>End Date</th>
      </tr>
    </thead>
    <tbody>

<?php
$sql = "SELECT * FROM campaigns ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['title']}</td>";
    echo "<td>KES " . number_format($row['target_amount']) . "</td>";
    echo "<td>KES 0</td>";
    echo "<td>Active</td>";
    echo "<td>{$row['end_date']}</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='5'>No campaigns found</td></tr>";
}
?>

    </tbody>
  </table>

</div>

<footer>
  <p>© 2026 Donor Perfect | Campaign Management</p>
</footer>

</body>
</html>
</p>
</footer>