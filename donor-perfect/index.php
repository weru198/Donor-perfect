<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Donor Perfect | Donation Tracking System</title>
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
    header h1 {
      margin: 0;
      font-size: 22px;
    }
    nav a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-weight: bold;
    }
    .container {
      padding: 30px;
    }
    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }
    .card {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .card h3 {
      margin-top: 0;
      color: #0f766e;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
      background: white;
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
  <h2>Dashboard Overview</h2>

  <div class="cards">
    <div class="card">
      <h3>Total Campaigns</h3>
      <p id="totalCampaigns">8 Active</p>
    </div>
    <div class="card">
      <h3>Total Donations</h3>
      <p id="totalDonations">KES 1,250,000</p>
    </div>
    <div class="card">
      <h3>Total Donors</h3>
      <p>320</p>
    </div>
    <div class="card">
      <h3>Disbursement Status</h3>
      <p>90% Completed</p>
    </div>
  </div>

  <h2>Recent Donations</h2>
  <table>
    <thead>
      <tr>
        <th>Donor Name</th>
        <th>Campaign</th>
        <th>Amount (KES)</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John Mwangi</td>
        <td>Medical Support</td>
        <td>5,000</td>
        <td>Disbursed</td>
        <td>12-Jan-2026</td>
      </tr>
      <tr>
        <td>Grace Achieng</td>
        <td>School Fees Drive</td>
        <td>10,000</td>
        <td>Pending</td>
        <td>14-Jan-2026</td>
      </tr>
      <tr>
        <td>Peter Kamau</td>
        <td>Flood Relief</td>
        <td>3,500</td>
        <td>Collected</td>
        <td>18-Jan-2026</td>
      </tr>
    </tbody>
  </table>
</div>

<footer>
  <p>© 2026 Donor Perfect | Transparent Donation Tracking System</p>
</footer>
<script src="script.js"></script>

</body>
</html>
