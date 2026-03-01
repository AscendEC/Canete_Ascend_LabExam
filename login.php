<?php
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        $error = 'All fields are required.';
    } else {
        $success = 'Login Successful!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>UM CCE Portal – Login</title>
<link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>

<div class="left">
  <div class="card">
    <h1>UM CCE Portal</h1>

    <?php if ($error): ?>
      <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
      <p style="font-size:13px;color:#111;">Go to <a href="register.php">Register</a></p>
    <?php else: ?>
    <form method="POST">
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter email"
               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password">
      </div>
      <button type="submit" class="btn">Sign In</button>
    </form>
    <div class="link-row">
      <a href="#">Forgot password?</a>
      &nbsp;|&nbsp;
      <a href="register.php">Create an account</a>
    </div>
    <?php endif; ?>
  </div>
</div>

<div class="logo-wrap">
  <img src="CCE_logo.png" alt="Logo">
</div>

</body>
</html>