<?php	
include '../../conexionBD.php';
require '../../lib/cursos.php';
$cursos = new cursos($datosConexionBD);
$cursos->id = $_POST['idCursoRow'];
$cursos->lenguaje = $_POST['name'];
$result = $cursos->modificarCurso();

$return = array(
	'result' => $result
);
echo json_encode($return);
?>