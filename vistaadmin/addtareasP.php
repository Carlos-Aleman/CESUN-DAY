<?php

  session_start();
  if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
  }
  require 'phptareas/database.php';

  date_default_timezone_set('America/Tijuana');

    $fecha_actual=date("d/m/Y H:i");

  $message = '';

  if (!empty($_POST['id_proyecto']) && !empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['usuario']) && !empty($_POST['fecha_inicio']) && !empty($_POST['fecha_limite'])) {
    $sql = "INSERT INTO tareas (id_proyecto ,nombre, descripcion,usuario, fecha_inicio, fecha_limite) VALUES (:id_proyecto, :nombre, :descripcion, :usuario, :fecha_inicio, :fecha_limite)";
    $stmt = $conn->prepare($sql);
     $stmt->bindParam(':id_proyecto', $_POST['id_proyecto']);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':descripcion', $_POST['descripcion']);
    $stmt->bindParam(':usuario', $_POST['usuario']);
     $stmt->bindParam(':fecha_inicio', $_POST['fecha_inicio']);
     $stmt->bindParam(':fecha_limite', $_POST['fecha_limite']);

    if ($stmt->execute()) {
      $message = 'Se creo la tarea';
    } else {
      $message = 'Error a crear la tarea';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CESUNDAY</title>
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
    <style>
         .round {

 background-color: #fff;
 width: auto;
 height: auto;
 margin: 0 auto 15px auto;
 padding: 5px;
 border: 1px solid #ccc;

 -moz-border-radius: 11px;
 -webkit-border-radius: 11px;
 border-radius: 11px;
 behavior: url(border-radius.htc);

    }

    </style>
  <body>

    <form action="addtareasp.php" method="POST" class="w3-container">
    	<br>
    	<div class="w3-row-padding">

    		<p>Proyecto</p>
    		<select name="id_proyecto" class="round">
    			<?php

				$conexion = mysqli_connect("localhost","root","","cesunday");

				$query = $conexion->query("SELECT * FROM tareaglobal where activo = '1'");

				echo '<option value="NADA">Seleccione un proyecto</option>';

				while ( $row = $query->fetch_assoc() )
				{
					echo '<option value="' . $row['id_proyecto']. '">' . $row['nombre_proyecto'] . '</option>' . "\n";
				}
				?>
    		</select>
  		</div>
  		<div class="w3-row-padding">

    		<p>Nombre De La Tarea</p>
    		<input name="nombre" type="text" placeholder="Tarea" class="round">
  		</div>
  		<div class="w3-row-padding">

    		<p>Descripcion</p>
    		<input name="descripcion" type="text" placeholder="Descripcion" class="round">
  		</div>
  		<div class="w3-row-padding">

    		<p>Usuario (JEFE)</p>
    		<!-- <input name="usuario" type="text" placeholder="usuario" class="round"> -->
    		<select name="usuario" class="round">
    			<?php

				$conexion = mysqli_connect("localhost","root","","cesunday");

				$query = $conexion->query("SELECT * FROM usuarios where jefe = 'Si' and activo = '1'");

				echo '<option value="NADA">Seleccione al usuario</option>';

				while ( $row = $query->fetch_assoc() )
				{
					echo '<option value="' . $row['id_usuario']. '">' . $row['nombres'] . '</option>' . "\n";
				}
				?>
    		</select>
  		</div>
  	
    		<input name="fecha_inicio" type="text" value="<?= $fecha_actual ?>" style="display: none;" class="round">
  		
  		<div class="w3-row-padding">

    		<p>Fecha Limite</p>
    		<input name="fecha_limite" type="text" value="<?= $fecha_actual ?>" class="round">
  		</div>
      
      <input type="submit" value="Submit" class="round">
    </form>

    <br>
    <input type="button" onclick="location='addtareas.php'" value="Regresar" />

  </body>
</html>
