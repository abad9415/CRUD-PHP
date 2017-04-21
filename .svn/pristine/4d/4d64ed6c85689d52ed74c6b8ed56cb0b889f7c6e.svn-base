<?php
date_default_timezone_set('America/Tijuana');
include '../../conexionBD.php';
require '../../lib/empleados.php';
$empleados = new empleados($datosConexionBD);
$empleados->id = $_POST['id'];
$result = $empleados->eliminarEmpleadoXid();
$return = array(
	'result' => $result
);
echo json_encode($return);
?>