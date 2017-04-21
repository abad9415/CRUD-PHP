<?php
date_default_timezone_set('America/Tijuana');
include '../../conexionBD.php';
require '../../lib/cursos.php';
$cursos = new cursos($datosConexionBD);
$cursos->id = $_POST['id'];
$result = $cursos->eliminarCursoXid();
$return = array(
	'result' => $result
);
echo json_encode($return);
?>