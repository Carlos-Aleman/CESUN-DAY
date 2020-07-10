<?php 
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
  }
 ?>
<?php

    include "conexion.php";

	ModificarProducto($_POST['nombre_proyecto'], $_POST['descripcion'], $_POST['area_proyecto'], $_POST['activo'], $_POST['no']);

	function ModificarProducto($nom, $des, $area, $activo, $no)
	{

		date_default_timezone_set('America/Tijuana');
    	$fecha_actual=date("d/m/Y H:i");

		$conexion=mysqli_connect('localhost','root','','cesunday');
		
		if ($activo == 0) {


			$sql = "UPDATE tareaglobal set nombre_proyecto='".$nom."', descripcion='".$des."', area_proyecto='".$area."', activo='".$activo."', fecha_final='".$fecha_actual."'  WHERE id_proyecto='".$no."' ";
		    

		 	mysqli_query($conexion, $sql);
		}
		else{
			$sql = "UPDATE tareaglobal set nombre_proyecto='".$nom."', descripcion='".$des."', area_proyecto='".$area."', activo='".$activo."'  WHERE id_proyecto='".$no."' ";
		    

		 mysqli_query($conexion, $sql);
		}
		
		
	}
?>

<script type="text/javascript">
	alert("Informacion Actualizada exitosamente");
	window.location.href='../addtareaglobal.php';
</script>