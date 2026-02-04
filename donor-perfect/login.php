<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];

  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    $_SESSION['user'] = $user['name'];
    $_SESSION['role'] = $user['role'];

    // audit log
    mysqli_query($conn,
      "INSERT INTO audit_logs (action, user, description)
       VALUES ('Login', '{$user['name']}', 'User logged in')"
    );

    header("Location: index.php");
    exit;
  } else {
    $error = "User not found";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login | Donor Perfect</title>
  <style>
    body { font-family:Arial; background:#f4f6f9; }
    form { width:300px; margin:100px auto; background:white; padding:20px; border-radius:8px; }
    input, button { width:100%; padding:10px; margin-top:10px; }
    button { background:#0f766e; color:white; border:none; }
  </style>
</head>

<body>
<form method="POST">
  <h2>System Login</h2>

  <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>

  <input type="email" name="email" placeholder="Email address" required>
  <button type="submit">Login</button>
</form>
</body>
</html>
