<?php
date_default_timezone_set('America/Tijuana');
	include '../../conexionBD.php';
	require '../../lib/empleados.php';
	$empleados = new empleados($datosConexionBD);
  $fechaNacimiento = $_POST['fechaNacimiento'];
/*Sacando la Edad del empleado*/
  $diaActual=date('d');
  $mesActual=date('m');
  $anoActual=date('o');

  $fechaNacimientoPartida = explode("-", $fechaNacimiento);
  $anioNac = $fechaNacimientoPartida[0];
  $mesNac = $fechaNacimientoPartida[1];
  $diaNac = $fechaNacimientoPartida[2];

  if (($mesNac == $mesActual) && ($diaNac > $diaActual)) {
      $anoActual=$anoActual-1; 
  }
  if ($mesNac > $mesActual) {
    $anoActual=$anoActual-1;
  }
  $edad=$anoActual-$anioNac;
/*////*Sacando la Edad del empleado*/
//   Mandamos los parametro para que la funcion altaEmpleado tenga datos
  $empleados->nombre = $_POST['name'];
  $empleados->edad = $edad;
  $empleados->direccion = $_POST['direccion'];
  $empleados->estado = 1;
  $empleados->fecha_nacimiento = $_POST['fechaNacimiento'];
  $empleados->telefono = $_POST['telefono'];
  $idEmpleado = $empleados->altaEmpleado();

  $empleados->puesto = $_POST['puesto'];
  $empleados->salario = $_POST['salario'];
  $empleados->tbl_empleado_id = $idEmpleado;
  $result = $empleados->altaDatosEconomicosEmpleados();

  $return = array(
    'result' => $result
  );
  echo json_encode($return);
?>