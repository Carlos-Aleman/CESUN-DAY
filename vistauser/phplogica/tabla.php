<?php

  session_start();
  if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
  }

   require 'database.php';

    $records = $conn->prepare('SELECT id_usuario, nombres, username, password, jefe FROM usuarios WHERE id_usuario = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
    $uss = $user['nombres'];

include "conexion.php";

$user_id=null;

$sql1= "SELECT t.id_tarea,t.nombre, u.nombres , t.fecha_inicio, p.nombre_proyecto from tareas t inner JOIN tareaglobal p on t.id_proyecto = p.id_proyecto inner join usuarios u on t.usuario = u.id_usuario where u.nombres = '". $uss ."' ";

$query = $con->query($sql1);
?>


     
  

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th align="center" width="250">Nombre Proyecto</th>
  	<th align="center">Tarea</th>
  	<th align="center">Fecha Inicio</th>
  	<th align="center">Modificar</th>
  	<th align="center">Asignar a subordinado</th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td align="center"><?php echo $r["nombre_proyecto"]; ?></td>
  	<td><?php echo $r["nombre"]; ?></td>
  	<td><?php echo $r["fecha_inicio"]; ?></td>

	<?php 
		echo "<td> <a href='phplogica/mod.php?no=".$r['id_tarea']."'> <button type='button' class='btn btn-primary'>Modificar</button> </a> </td>";
		echo "<td> <a href='phplogica/#?no=".$r['id_tarea']."'> <button type='button' class='btn btn-alert'>Asignar A Subordinado</button> </a> </td>";
   		//echo "</tr>";
    ?>
	
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
  <!-- Modal -->
</div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->