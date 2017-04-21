<?php
date_default_timezone_set('America/Tijuana');
include '../../conexionBD.php';
require '../../lib/cursos.php';
$cursos = new cursos($datosConexionBD);
$cursos->tbl_empleado_id = $_POST['id'];
$cursos->tbl_lenguajes_id = $_POST['idCurso'];
$result = $cursos->removerEmpleadoDeConocimiento();
$return = array(
	'result' => $result
);
echo json_encode($return);
?>