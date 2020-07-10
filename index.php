<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id_usuario, nombres, username, password, jefe FROM usuarios WHERE id_usuario = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CESUNDAY INICIO</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    

    <?php if(!empty($user)): ?>
     <!--  <br> CESUN DAY <?= $user['nombres']; ?>
     
      <a href="logout.php">
        Logout
      </a> -->  
        <?php if($user['jefe'] == 'Admin'):
          header('Location: vistaadmin/index.php'); 
         else:
          header('Location: vistauser/index.php'); 
        endif; ?>

    <?php else: ?>
      
      <?php header('Location: login.php'); ?>

    <?php endif; ?>
  </body>
</html>
