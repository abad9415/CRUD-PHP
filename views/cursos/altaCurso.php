<?php
include '../../conexionBD.php';
require '../../lib/cursos.php';
$cursos = new cursos($datosConexionBD);
$idCurso=(isset($_REQUEST['idCurso']))?$_REQUEST['idCurso']:"";
$btnAction = "Guardar";
$title = "Registrar Curso";
$nombre = "";
$fechaNacimiento = "";
$Direccion = "";
$telefono = "";
$puesto = "";
$salario = "";
if(isset($_REQUEST['idCurso'])){
	$btnAction = "Modificar";
	$title = "Modificar Curso";
	$cursos->id = $idCurso;
	$consultarCursoXidRow = $cursos->consultarCursoXid();
	foreach($consultarCursoXidRow as $row){
		$nombre = $row['lenguaje'];
	}
}
?>
<div class="row">
  <div class="col s12">
    <h5 class="center-align blue-text text-darken-2"><?=$title;?></h5>
  </div>
  <form class="col s12" id="formCursos">
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix blue-text text-darken-2 icon-code"></i>
        <input id="name" name="name" type="text" value="<?=$nombre;?>" placeholder="Javascript" autocomplete="off" class="" required>
        <label for="name" class="active light-blue-text text-darken-4">Nombre del curso</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <a id="regresarACursos" class="waves-effect waves-light btn blue darken-2"><i class="icon-arrow-left2"></i></a>
       <input type="hidden" id="idCursoRow" name="idCursoRow" value="<?=$idCurso;?>">
				<input type="submit" class="waves-effect waves-light btn blue darken-2" value="<?=$btnAction;?>" id="btnSubmit">
      </div>
    </div>
  </form>
</div>

<script>
  $("#formCursos").submit(function(){
		if($("#btnSubmit").val() == 'Guardar'){
			var url = 'actions/cursos/altaCurso.php';
			var vistaReturn = "views/cursos/altaCurso.php";
		}else{
			var url = 'actions/cursos/modificarCursos.php';
			var vistaReturn = "views/cursos/cursos.php";
		}
    $.ajax({
						type: "POST",
						dataType:"json",
						url: url,
						data: $("#formCursos").serialize()
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
  $("#regresarACursos").click(function(){
    btnActive('.btncursos');
        load();
        $("#content").load( "views/cursos/cursos.php");
  });
</script>