<?php
include '../../conexionBD.php';
require '../../lib/cursos.php';
require '../../lib/empleados.php';
$cursos = new cursos($datosConexionBD);
$empleados = new empleados($datosConexionBD);
$error = "";
$idCurso = $_POST['idCursoRow'];
$textAbuscar = $_POST['inputSearchEmpleado'];
$idEmpleado = intval(preg_replace('/[^0-9]+/', '', $textAbuscar), 10); 
$empleados->id = $idEmpleado;
$consultarEmpleadoXidRow = $empleados->consultarEmpleadoXid();
$x = 0;
foreach($consultarEmpleadoXidRow as $row){
	$x++;
}
if($x > 0){
	$cursos->tbl_lenguajes_id = $idCurso;
	$cursos->tbl_empleado_id = $idEmpleado;
	$cursos->curso = 1;
	$cursos->porcentaje = $_POST['porcentaje'];;
	$cursos->altaConocimiento();
}else{
	$error = "No se encontro Empleado";
}

$return = array(
	'result' => $error
);
echo json_encode($return);
?>