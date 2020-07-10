<?php 
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
  }
?>
<?php

    include "conexion.php";

	ModificarProducto($_POST['nombre'], $_POST['telefono'], $_POST['abonos'], $_POST['status'], $_POST['no']);

	function ModificarProducto($nom, $tel, $abo, $sta, $no)
	{


		$conexion=mysqli_connect('db793463892.hosting-data.io','dbo793463892','Andromed@119','db793463892');
		// $sql = "UPDATE refacciones SET refaccion= '".$refa."', descripcion= '".$descrip."', cantidad= '".$cant."', minimo= '".$min."' WHERE no= '".$no."' ";
		$sql = "UPDATE equiposfinal set nombre='".$nom."', telefono='".$tel."', abonos='".$abo."', status='".$sta."'  WHERE numero_nota='".$no."' ";
		    

		 mysqli_query($conexion, $sql);
		
	}
?>

<script type="text/javascript">
	alert("Informacion Actualizada exitosamente");
	window.location.href='../index.php';
</script>