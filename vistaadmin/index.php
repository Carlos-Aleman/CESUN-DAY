<?php 
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
  }

  else{
    require 'phptareasglobales/database.php';

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
<html>
	<head>
		<title>Equipos Android</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>

	</head>
	<body>

    <h1>Vista principal de Admin <?= $user['nombres']; ?></h1>
    <br>
    <p>Agregar Proyecto (Tarea Global)</p>
    <a href="addtareaglobal.php">Crear Tarea Global</a>
    <br>
    <br>
    <p>Agregar Tareas (Tarea Global)</p>
    <a href="addtareas.php">Crear Tarea y A signarlas</a>
    <br>
    <br>
    <p>Partes De Dashboard</p>
    <a href="">Dashboar De Cada Usuario</a>
    <br>
    <a href="">Dashboar De Cada Departamento</a>
    <br>
    <a href="">Dashboar De Cada Global</a>

  <!--  <br> CESUN DAY <?= $user['nombres']; ?>
     
      <a href="../logout.php">
        Logout
      </a>   -->
	</body>
</html>