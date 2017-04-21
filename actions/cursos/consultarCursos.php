<?php
include '../../conexionBD.php';
require '../../lib/cursos.php';
$cursos = new cursos($datosConexionBD);
$parametrosDeBusqueda = $_POST['parametrosDeBusqueda'];
if($parametrosDeBusqueda == ""){
  $consultarCursosRow = $cursos->consultarCursos();
}else{
  $cursos->lenguaje = $parametrosDeBusqueda;
  $consultarCursosRow = $cursos->consultarCursosXnombre();
}
$xRows = 0;
foreach($consultarCursosRow as $row){
    $idCurso[$xRows] = $row['id'];
    $nombre[$xRows] = $row['lenguaje'];
    $cursos->tbl_lenguajes_id = $idCurso[$xRows];
    $totalDeEmpleadosInscritosXidCursoRow = $cursos->totalDeEmpleadosInscritosXidCurso();
    foreach($totalDeEmpleadosInscritosXidCursoRow as $row2){
      $totalInscritos[$xRows] = $row2['total'];
    }
  $xRows++;
}
$script = "";
if($xRows > 0){
  $tabla = '<table>
  <thead>
    <tr>
      <th></th>
      <th>No. Curso</th>
      <th>Lenguaje</th>
      <th>Inscritos</th>
    </tr>
  </thead>
  <tbody>';
 for($i=0; $i<$xRows; $i++){
    $tabla .= '<tr>
      <td><a class="dropdown-button waves-effect waves-light" data-activates="dropdown'.$idCurso[$i].'"><i class="material-icons">more_vert</i></a></td>
      <ul id="dropdown'.$idCurso[$i].'" class="dropdown-content">
        <li><a onClick="inscritos('.$idCurso[$i].');">Inscritos</a></li>
        <li><a onClick="modificar('.$idCurso[$i].');">Modificar</a></li>
        <li><a onClick="eliminar('.$idCurso[$i].',\''.$nombre[$i].'\');">Eliminar</a></li>
      </ul>
      <td>'.$idCurso[$i].'</td>
      <td>'.$nombre[$i].'</td>
      <td>'.$totalInscritos[$i].'</td>
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