<?php

if(!empty($_POST)){
	if(isset($_POST["nombre_proyecto"]) &&isset($_POST["descripcion"]) &&isset($_POST["area_proyecto"]) &&isset($_POST["fecha_inicio"])){

		if($_POST["nombre_proyecto"]!=""&& $_POST["descripcion"]!=""&& $_POST["area_proyecto"]!=""&&$_POST["fecha_inicio"]!=""){

			include "conexion.php";
			
			$sql = "insert into tareaglobal(nombre_proyecto, descripcion, area_proyecto, fecha_inicio) value (\"$_POST[nombre_proyecto]\",\"$_POST[descripcion]\",\"$_POST[area_proyecto]\",\"$_POST[fecha_inicio]\")";

			$query = $con->query($sql);

			
			header('Location: ../addtareaglobal.php');
		}
		header('Location: ../addtareaglobal.php');
	}
}




?>