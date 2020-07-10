<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from tareaglobal where activo = '1' order by id_proyecto desc";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
	<br>
<table class="table table-bordered table-hover">
<thead>

	<th align="center" width="250">Nombre Proyecto</th>
	<th align="center">Area Donde Se Aplico</th>
	<th align="center">Fecha Inicio</th>
	<th align="center">Modificar</th>
	
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td align="center"><?php echo $r["nombre_proyecto"]; ?></td>
	<td><?php echo $r["area_proyecto"]; ?></td>
	<td><?php echo $r["fecha_inicio"]; ?></td>

	
	
	
		<?php 
		
		 // echo "<td> <a href='php/nota.php?no=".$r['id_proyecto']."'> <button type='button' class='btn btn-success'>Nota</button> </a> </td>";
		 // echo "<td> <a href='php/notatra.php?no=".$r['id_proyecto']."'> <button type='button' class='btn btn-warning'>Nota Trabajo</button> </a> </td>";
		  echo "<td> <a href='phptareasglobales/mod.php?no=".$r['id_proyecto']."'> <button type='button' class='btn btn-primary'>Modificar</button> </a> </td>";
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