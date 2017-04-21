<?php
include '../../conexionBD.php';
require '../../lib/empleados.php';
$empleados = new empleados($datosConexionBD);
$parametrosDeBusqueda = $_POST['parametrosDeBusqueda'];
if($parametrosDeBusqueda == ""){
  $consultarEmpleadosRow = $empleados->consultarEmpleados();
}else{
  $empleados->nombre = $parametrosDeBusqueda;
  $consultarEmpleadosRow = $empleados->consultarEmpleadosXnombre();
}
$xRows = 0;
foreach($consultarEmpleadosRow as $row){
    $idEmpleado[$xRows] = $row['id'];
    $nombre[$xRows] = $row['nombre'];
    $puesto[$xRows] = $row['puesto'];
    $salarioRow = $row['salario'];
    $salario[$xRows] = number_format($salarioRow, 2, '.', ',');
  $xRows++;
}
$script = "";
if($xRows > 0){
  $tabla = '<table>
  <thead>
    <tr>
      <th></th>
      <th>No.</th>
      <th>Nombre</th>
      <th>Puesto</th>
      <th>Salario</th>
    </tr>
  </thead>
  <tbody>';
 for($i=0; $i<$xRows; $i++){
    $tabla .= '<tr>
      <td><a class="dropdown-button waves-effect waves-light" data-activates="dropdown'.$idEmpleado[$i].'"><i class="material-icons">more_vert</i></a></td>
      <ul id="dropdown'.$idEmpleado[$i].'" class="dropdown-content">
        <li><a onClick="modificar('.$idEmpleado[$i].');">Modificar</a></li>
        <li><a onClick="eliminar('.$idEmpleado[$i].',\''.$nombre[$i].'\');">Eliminar</a></li>
      </ul>
      <td>'.$idEmpleado[$i].'</td>
      <td>'.$nombre[$i].'</td>
      <td>'.$puesto[$i].'</td>
      <td>$'.$salario[$i].'</td>
    </tr>';
  }
$tabla .= '</tbody>
</table>';
  $script="<script>
  $('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 225,
    constrainWidth: false, // Does not change width of dropdown to that of the activator
    gutter: 0, // Spacing from edge
    belowOrigin: false, // Displays dropdown below the button
    alignment: 'left', // Displays dropdown with edge aligned to the left of button
    stopPropagation: false // Stops event propagation
  });
  </script>";
}else{
  $tabla = '<div>
              <h5 class="center-align">No se encontraron resultados</h5>
            </div>';
}
  $return = array(
    'tabla' => $tabla,
    'script' => $script,
  );
  echo json_encode($return);
?>