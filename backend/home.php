<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  header("Location: /index");
}

?>

<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="backend/css_file.css">

</head>
<body>

<div class="topnav">
  <a class="active" href="/home">Home</a>
  <div class="login-container">
    <form action="/login_session" method="post">
    <?php if (isset($_GET['error'])) { ?>

    <p class="error"><?php echo $_GET['error']; ?></p>

    <?php } ?>
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <button type="submit">Login</button>
    </form>
  </div>
</div>

<div style="padding-left:16px">
  <h2>Backend aplikasi EL-AKIP</h2>
  <p>Hanya admin yang dapat mengakses.</p>
</div>

</body>
</html>