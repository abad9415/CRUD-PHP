<?php
include '../../conexionBD.php';
require '../../lib/empleados.php';
$empleados = new empleados($datosConexionBD);
$idEmpleado=(isset($_REQUEST['idEmpleado']))?$_REQUEST['idEmpleado']:"";
$btnAction = "Guardar";
$title = "Registrar Empleado";
$nombre = "";
$fechaNacimiento = "";
$Direccion = "";
$telefono = "";
$puesto = "";
$salario = "";
if(isset($_REQUEST['idEmpleado'])){
	$btnAction = "Modificar";
	$title = "Modificar Empleado";
	$empleados->id = $idEmpleado;
	$consultarEmpleadoXidRow = $empleados->consultarEmpleadoXid();
	foreach($consultarEmpleadoXidRow as $row){
		$nombre = $row['nombre'];
		$fechaNacimiento = $row['fecha_nacimiento'];
		$Direccion = $row['direccion'];
		$telefono = $row['telefono'];
		$puesto = $row['puesto'];
		$salario = $row['salario'];
	}
}
?>
<div class="row">
  <div class="col s12">
    <h5 class="center-align blue-text text-darken-2"><?=$title;?></h5>
  </div>
  <form class="col s12" id="formEmpleados">
    <div class="row">
      <div class="input-field col m6 s12">
        <i class="material-icons prefix blue-text text-darken-2">account_circle</i>
        <input id="name" name="name" type="text" value="<?=$nombre;?>" placeholder="Eduardo" autocomplete="off" class="" required>
        <label for="name" class="active light-blue-text text-darken-4">Nombre completo</label>
      </div>
      <div class="input-field col m6 s12">
        <i class="material-icons prefix blue-text text-darken-2">today</i>
        <input id="fechaNacimiento" name="fechaNacimiento" type="date" class="datepicker" value="<?=$fechaNacimiento;?>" autocomplete="off">
        <label for="fechaNacimiento" class="active light-blue-text text-darken-4">Fecha de Nacimiento</label>
      </div>
      <div class="input-field col s12">
        <i class="material-icons prefix blue-text text-darken-2">location_on</i>
        <input id="direccion" name="direccion" type="text" value="<?=$Direccion;?>" placeholder="Calle Miguel venegas #1137 Col. Solidaridad Mexicali" autocomplete="off">
        <label for="direccion" class="active light-blue-text text-darken-4">Dirección</label>
      </div>
      <div class="input-field col m6 s12">
        <i class="material-icons prefix blue-text text-darken-2">phone</i>
        <input id="telefono" name="telefono" type="tel" value="<?=$telefono;?>" placeholder="686224097" max="10" min="10" autocomplete="off" data-length="10">
        <label for="telefono" class="active light-blue-text text-darken-4">Telefono</label>
      </div>
      <div class="input-field col m6 s12">
        <i class="material-icons prefix blue-text text-darken-2">work</i>
        <input id="puesto" name="puesto" type="text" value="<?=$puesto;?>" placeholder="Analista" autocomplete="off">
        <label for="puesto" class="active light-blue-text text-darken-4">Puesto</label>
      </div>
      <div class="input-field col s12">
        <i class="material-icons prefix blue-text text-darken-2 icon-attach_money"></i>
        <input id="salario" name="salario" type="number" value="<?=$salario;?>" placeholder="MXN" autocomplete="off">
        <label for="salario" class="active light-blue-text text-darken-4">Salario</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <a id="regresarAempleados" class="waves-effect waves-light btn blue darken-2"><i class="icon-arrow-left2"></i></a>
       <input type="hidden" id="idEmpleadoRow" name="idEmpleadoRow" value="<?=$idEmpleado;?>">
				<input type="submit" class="waves-effect waves-light btn blue darken-2" value="<?=$btnAction;?>" id="btnSubmit">
      </div>
    </div>
  </form>
</div>

<script>
  $("#formEmpleados").submit(function(){
		if($("#btnSubmit").val() == 'Guardar'){
			var url = 'actions/empleados/altaEmpleado.php';
			var vistaReturn = "views/empleados/altaEmpleado.php";
		}else{
			var url = 'actions/empleados/modificarEmpleado.php';
			var vistaReturn = "views/empleados/empleados.php";
		}
    $.ajax({
						type: "POST",
						dataType:"json",
						url: url,
						data: $("#formEmpleados").serialize()
				}).done(function(res){
					swal(
							'Excelente!',
							''+res.result,
							'success'
						)
          load();
           $("#content").load( vistaReturn );
				});
    return false;
  });
  $("#regresarAempleados").click(function(){
    btnActive('.btnEmpleados');
        load();
        $("#content").load( "views/empleados/empleados.php");
  });
  $('input#telefono').characterCounter();
  $('.datepicker').pickadate({
    max: [2005, 12, 31],
    format: 'yyyy-mm-dd',
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 75 // Creates a dropdown of 15 years to control year
  });
</script>