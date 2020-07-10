<?php

include "conexion.php";

$user_id=null;
$sql1= "SELECT t.id_tarea,t.nombre, u.nombres , t.fecha_inicio, p.nombre_proyecto from tareas t inner JOIN tareaglobal p on t.id_proyecto = p.id_proyecto inner join usuarios u on t.usuario = u.id_usuario";
	
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
	<br>
<table class="table table-bordered table-hover">
<thead>

	<th align="center" width="250">Nombre Proyecto</th>
	<th align="center">Nombre de la tarea</th>
	<th align="center">Usuario</th>
	<th align="center">Fecha Inicio</th>
	<th align="center">Modificar</th>
	
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td align="center"><?php echo $r["nombre_proyecto"]; ?></td>
	<td><?php echo $r["nombre"]; ?></td>
	<td><?php echo $r["nombres"]; ?></td>
	<td><?php echo $r["fecha_inicio"]; ?></td>

	
	
	
		<?php 
		
		 // echo "<td> <a href='php/nota.php?no=".$r['id_proyecto']."'> <button type='button' class='btn btn-success'>Nota</button> </a> </td>";
		 // echo "<td> <a href='php/notatra.php?no=".$r['id_proyecto']."'> <button type='button' class='btn btn-warning'>Nota Trabajo</button> </a> </td>";
		  echo "<td> <a href='phptareasglobales/mod.php?no=".$r['id_tarea']."'> <button type='button' class='btn btn-primary'>Modificar</button> </a> </td>";
        echo "</tr>";
         ?>
	
</tr>
<?php endwhile;?>
</table>
<br>
<?php else:?>
	<br>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
  <!-- Modal -->
</div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->