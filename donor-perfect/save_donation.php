<?php
include 'db.php';

$donor = $_POST['donor_name'];
$campaign_id = $_POST['campaign_id'];
$amount = $_POST['amount'];
$payment = $_POST['payment_method'];

$sql = "INSERT INTO donations (donor_name, campaign_id, amount, payment_method, status)
        VALUES ('$donor', '$campaign_id', '$amount', '$payment', 'Collected')";

mysqli_query($conn, $sql);

// audit log
$log = "INSERT INTO audit_logs (action, user, description)
        VALUES ('Donation', '$donor', 'Donated KES $amount')";
mysqli_query($conn, $log);

header("Location: donations.php");
?>
