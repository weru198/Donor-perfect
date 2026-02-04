<?php
include 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$target = $_POST['target_amount'];
$category = $_POST['category'];
$end_date = $_POST['end_date'];

$sql = "INSERT INTO campaigns (title, description, target_amount, category, end_date)
        VALUES ('$title', '$description', '$target', '$category', '$end_date')";

mysqli_query($conn, $sql);

// Audit log
$log = "INSERT INTO audit_logs (action, user, description)
        VALUES ('Create Campaign', 'Admin', 'Campaign $title created')";
mysqli_query($conn, $log);

header("Location: campaigns.php");
?>
