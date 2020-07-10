<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /competencia');
  }
  require 'database.php';

  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_usuario, username, password FROM usuarios WHERE username = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id_usuario'];
      header("Location: /competencia");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CESUNDAY LOGIN</title>
  
  </head>
  <body>
  

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="username" type="text" placeholder="Username">
      <input name="password" type="password" placeholder="Password">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
