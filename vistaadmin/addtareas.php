<?php 
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
  }

  else{
    require 'phptareas/database.php';

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
	<?php include "phptareas/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>Lista De Tareas Para Asignar</h2>
<!-- Button trigger modal -->
<form class="form-inline" role="search" id="buscar">
      <div class="form-group">
      <!--   <input type="text" name="s" class="form-control" placeholder="Buscar Equipos">
      </div>
      <button type="submit" class="btn btn-info">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button> -->

  <!-- <a data-toggle="modal" href="addtareasP.php" class="btn btn-danger">Agregar Tareas Globales</a> -->
  <input type="button" onclick="location='addtareasP.php'" value="Asignar tareas a proyecto" />
    </form>

<br>


  <!-- Modal -->


<div id="tabla"></div>


</div>
</div>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>

function loadTabla(){
  $('#editModal').modal('hide');

  $.get("./phptareas/tabla.php","",function(data){
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("./phptareas/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./phptareas/agregar.php",$("#agregar").serialize(),function(data){
    });
    //alert("Agregado exitosamente!");
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
    loadTabla();
  });
</script>

	</body>
</html>