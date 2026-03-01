<?php
$error   = '';
$success = '';
$fields  = ['full_name' => '', 'um_id' => '', 'email' => '', 'password' => '', 'confirm_password' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($fields as $key => $_) {
        $fields[$key] = trim($_POST[$key] ?? '');
    }

    if (in_array('', $fields, true)) {
        $error = 'All fields are required.';
    } elseif ($fields['password'] !== $fields['confirm_password']) {
        $error = 'Passwords do not match.';
    } else {
        $success = 'Registration Successful!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>UM CCE Portal – Register</title>
<link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>

<div class="left">
  <div class="card">
    <h1>Create an account</h1>

    <?php if ($error): ?>
      <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
      <p style="font-size:13px;color:#111;">Go back to <a href="login.php">Sign In</a></p>
    <?php else: ?>
    <form method="POST">
      <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="full_name" placeholder="Enter name"
               value="<?= htmlspecialchars($fields['full_name']) ?>">
      </div>
      <div class="form-group">
        <label>UM ID Number</label>
        <input type="text" name="um_id" placeholder="Enter ID Number"
               value="<?= htmlspecialchars($fields['um_id']) ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter email"
               value="<?= htmlspecialchars($fields['email']) ?>">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password">
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Re-enter Password">
      </div>
      <button type="submit" class="btn">Register Account</button>
    </form>
    <div class="link-row">
      Already have an account? <a href="login.php">Sign In</a>
    </div>
    <?php endif; ?>
  </div>
</div>

<div class="logo-wrap">
  <img src="CCE_logo.png" alt="Logo">
</div>

</body>
</html>