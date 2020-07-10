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
	</head>
	<body>
	<?php include "phptareasglobales/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>Lista De Tareas Globales</h2>
<!-- Button trigger modal -->
<form class="form-inline" role="search" id="buscar">
      <div class="form-group">
      <!--   <input type="text" name="s" class="form-control" placeholder="Buscar Equipos">
      </div>
      <button type="submit" class="btn btn-info">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button> -->

  <a data-toggle="modal" href="#newModal" class="btn btn-danger">Agregar Tareas Globales</a>
    </form>

<br>
  <?php

    date_default_timezone_set('America/Tijuana');

    $fecha_actual=date("d/m/Y H:i");

  ?>
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Tareas Globales</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar">

              <h4 align="center">Llenar Los Datos Correctamente</h4>
              <hr>
            
          
              <label>Nombre Proyecto (Global):</label>
              <input type="text" name="nombre_proyecto"  id="nombre_proyecto" class="round" required style="width: 530px;">
           
            	<br>
              <label>Descripcion:</label>
              <textarea name="descripcion" id="descripcion" rows="6" cols="71" class="round" required>Una breve descripcion del proyecto (Global)</textarea>

              <br>
            
              <label>Area Donde Se Aplica:</label>
              <input type="text" name="area_proyecto" id="area_proyecto" style="width: 530px;"  class="round"required>
           
              <input type="text" name="fecha_inicio" id="fecha_inicio" value="<?= $fecha_actual ?>" style="display: none;" required>


  <button type="submit" class="btn btn-default" style="width: 530px;background-color: green;color: white"  onclick="location.reload();">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="tabla"></div>


</div>
</div>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>

function loadTabla(){
  $('#editModal').modal('hide');

  $.get("./phptareasglobales/tabla.php","",function(data){
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("./phptareasglobales/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./phptareasglobales/agregar.php",$("#agregar").serialize(),function(data){
    });
    //alert("Agregado exitosamente!");
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
    loadTabla();
  });
</script>

	</body>
</html>