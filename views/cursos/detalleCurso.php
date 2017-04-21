<?php
include '../../conexionBD.php';
require '../../lib/cursos.php';
require '../../lib/empleados.php';
$cursos = new cursos($datosConexionBD);
$empleados = new empleados($datosConexionBD);
$idCurso=(isset($_REQUEST['idCurso']))?$_REQUEST['idCurso']:"";
$cursos->id = $idCurso;
$consultarCursoXidRow = $cursos->consultarCursoXid();
foreach($consultarCursoXidRow as $row){
	$nombre = $row['lenguaje'];
}

$empleados->id = $idCurso;
$consultarEmpleadosRow = $empleados->consultarEmpleadosNoInscritosXidCurso();
$xg = 0;
foreach($consultarEmpleadosRow as $row){
	$idEmpleado[$xg] = $row['id'];
	$nombreEmpleado[$xg] = $row['nombre'];
	$xg++;
}

$cursos->tbl_lenguajes_id = $idCurso;
$consultarInscritosXidCursoRow = $cursos->consultarInscritosXidCurso();
$xRows = 0;
foreach($consultarInscritosXidCursoRow as $row){
	$idEmpleadoInscrito[$xRows] = $row['tbl_empleado_id'];
	$nombreEmpleadoInscrito[$xRows] = $row['nombre'];
	$porcentaje[$xRows] = $row['porcentaje'];
	$xRows++;
}
?>
<div class="row">
  <div class="col s12">
    <h5 class="blue-text text-darken-2">Curso de <?=$nombre;?></h5>
  </div>
  <form class="col s12" id="formAgregarEmpleado">
    <div class="row">
      <div class="input-field col m6 s12">
        <i class="material-icons prefix blue-text text-darken-2 icon-person"></i>
        <input type="text" id="inputSearchEmpleado" name="inputSearchEmpleado" class="autocomplete" required>
          <label class="active" for="inputSearchEmpleado">Buscar Empleado</label>
      </div> 
			<div class="input-field col m6 s12">
        <i class="material-icons prefix blue-text text-darken-2 icon-local_library"></i>
        <input type="number" id="porcentaje" name="porcentaje" placeholder="50%" max="100" required>
          <label class="active" for="porcentaje">Porcentaje</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <a id="regresarACursos" class="waves-effect waves-light btn blue darken-2"><i class="icon-arrow-left2"></i></a>
       <input type="hidden" id="idCursoRow" name="idCursoRow" value="<?=$idCurso;?>">
				<input type="submit" class="waves-effect waves-light btn blue darken-2" value="Agregar Empleado" id="btnSubmit">
      </div>
    </div>
  </form>
</div>

<table>
  <thead>
    <tr>
      <th></th>
      <th>No.</th>
      <th>Nombre</th>
      <th>Porcentaje</th>
    </tr>
  </thead>
  <tbody>
		<?php
		for($i=0; $i<$xRows; $i++){
			?>
		<tr>
      <td><a class="dropdown-button waves-effect waves-light" data-activates="dropdown<?=$idEmpleadoInscrito[$i];?>"><i class="material-icons">more_vert</i></a></td>
      <ul id="dropdown<?=$idEmpleadoInscrito[$i];?>" class="dropdown-content">
        <li><a onClick="quitarEmpleado(<?=$idEmpleadoInscrito[$i];?>, '<?=$nombreEmpleadoInscrito[$i];?>');">Quitar</a></li>
      </ul>
      <td><?=$idEmpleadoInscrito[$i];?></td>
      <td><?=$nombreEmpleadoInscrito[$i];?></td>
      <td><?=$porcentaje[$i];?>%</td>
    </tr>
		<?php
		}
		?>
		
</tbody>
</table>

<script>
	function quitarEmpleado(id, nombre){
		swal({
			title: 'Atención!',
			text: "Quitar al empleado "+nombre+"?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Quitarlo!'
		}).then(function () {
			$.ajax({
						type: "POST",
						dataType:"json",
						url: 'actions/cursos/quitarEmpleado.php',
						data: 'id='+id+ '&idCurso=<?=$idCurso;?>'
				}).done(function(res){
					load();
    			$("#content").load("views/cursos/detalleCurso.php?idCurso=<?=$idCurso;?>");
				});
		})
	}
  $("#formAgregarEmpleado").submit(function(){
    $.ajax({
						type: "POST",
						dataType:"json",
						url: 'actions/cursos/agregarEmpleado.php',
						data: $("#formAgregarEmpleado").serialize()
				}).done(function(res){
				if(res.result == ''){
					load();
    			$("#content").load("views/cursos/detalleCurso.php?idCurso=<?=$idCurso;?>");
				}else{
					swal(
							'Oops...',
							''+res.result,
							'error'
						)
					$("#inputSearchEmpleado").val('');
				}
					
				});
    return false;
  });
  $("#regresarACursos").click(function(){
    btnActive('.btncursos');
        load();
        $("#content").load( "views/cursos/cursos.php");
  });
	
	$('input.autocomplete').autocomplete({
    data: {
			<?php
			for($i = 0; $i<$xg; $i++){
				?>
				"No.<?=$idEmpleado[$i];?> - <?=$nombreEmpleado[$i];?>": null,
			<?php
			}
			?>
    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
    },
    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
  });
	
  $('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 225,
    constrainWidth: false, // Does not change width of dropdown to that of the activator
    gutter: 0, // Spacing from edge
    belowOrigin: false, // Displays dropdown below the button
    alignment: 'left', // Displays dropdown with edge aligned to the left of button
    stopPropagation: false // Stops event propagation
  });
</script>