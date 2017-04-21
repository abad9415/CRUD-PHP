<?php
	include '../../conexionBD.php';
	require '../../lib/cursos.php';
	$cursos = new cursos($datosConexionBD);
  $cursos->lenguaje = $_POST['name'];
  $result = $cursos->altaCurso();

  $return = array(
    'result' => $result
  );
  echo json_encode($return);
?>