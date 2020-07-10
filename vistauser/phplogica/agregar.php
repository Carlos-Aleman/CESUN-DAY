<?php

if(!empty($_POST)){
	if(isset($_POST["fecha"]) &&isset($_POST["nombre"]) &&isset($_POST["telefono"]) &&isset($_POST["marca"]) &&isset($_POST["modelo"]) &&isset($_POST["color"]) && isset($_POST["imei"]) && isset($_POST["codigo"]) && isset($_POST["falla_equipo"]) && isset($_POST["trabajo"]) && isset($_POST["cracks"]) && isset($_POST["enciende"]) && isset($_POST["detalle_equipo"]) && isset($_POST["quien_recibio"]) && isset($_POST["status"]) && isset($_POST["precio"]) && isset($_POST["abonos"])  &&isset($_POST["sucursal"])){

		if($_POST["fecha"]!=""&& $_POST["nombre"]!=""&& $_POST["telefono"]!=""&&$_POST["marca"]!=""&&$_POST["modelo"]!=""&& $_POST["color"]!=""&&$_POST["imei"]!=""&&$_POST["codigo"]!=""&& $_POST["falla_equipo"]!=""&&$_POST["trabajo"]!=""&&$_POST["cracks"]!=""&& $_POST["enciende"]!=""&&$_POST["detalle_equipo"]!=""&&$_POST["quien_recibio"]!=""&& $_POST["status"]!=""&&$_POST["precio"]!=""&&$_POST["abonos"]!=""&&$_POST["sucursal"]!=""){

			include "conexion.php";
			
			$sql = "insert into equiposfinal(fecha, nombre, telefono, marca, modelo, color, imei, codigo, falla_equipo, trabajo, cracks, enciende, detalle_equipo, quien_recibio, status, precio, abonos,sucursal) value (\"$_POST[fecha]\",\"$_POST[nombre]\",\"$_POST[telefono]\",\"$_POST[marca]\",\"$_POST[modelo]\",\"$_POST[color]\",\"$_POST[imei]\",\"$_POST[codigo]\",\"$_POST[falla_equipo]\",\"$_POST[trabajo]\",\"$_POST[cracks]\",\"$_POST[enciende]\",\"$_POST[detalle_equipo]\",\"$_POST[quien_recibio]\",\"$_POST[status]\",\"$_POST[precio]\",\"$_POST[abonos]\" ,\"$_POST[sucursal]\")";

			$query = $con->query($sql);

			// if($query!=null){
			// 	print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
				
			// }else{
			// 	//print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";

			// }
			header('Location: ../index.php');
		}
		header('Location: ../index.php');
	}
}




?>