<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['nombres']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['jefe']) && !empty($_POST['departamento']) && !empty($_POST['puesto'])) {
    $sql = "INSERT INTO usuarios (nombres ,username, password,jefe, departamento, puesto) VALUES (:nombres, :username, :password, :jefe, :departamento, :puesto)";
    $stmt = $conn->prepare($sql);
     $stmt->bindParam(':nombres', $_POST['nombres']);
    $stmt->bindParam(':username', $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':jefe', $_POST['jefe']);
    $stmt->bindParam(':departamento', $_POST['departamento']);
     $stmt->bindParam(':puesto', $_POST['puesto']);

    if ($stmt->execute()) {
      $message = 'Se creo el usuario';
    } else {
      $message = 'Error a crear el usuario';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>



    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
      <input name="nombres" type="text" placeholder="nombre completo">
      <input name="username" type="text" placeholder="Username">
      <input name="password" type="password" placeholder="Password">
      <input name="jefe" type="text" placeholder="jefe">
      <input name="departamento" type="text" placeholder="departamento">
      <input name="puesto" type="text" placeholder="puesto">
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
