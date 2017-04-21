<div id="contentConsultaLenguaje"></div> <!-- Contenedor de La tabla Lenguajes -->
<div class="fixed-action-btn">
  <a id="btnNuevoCurso" class="btn-floating btn-large waves-effect waves-light blue darken-2">
    <i class="material-icons">add</i>
  </a>
</div>

<script>
	var segundosAbuscar;
	$("#navSearch").show();
	buscarCursos($("#search").val());
	function inscritos(idCurso) {
     load();
    $("#content").load("views/cursos/detalleCurso.php?idCurso="+idCurso);
  }
	
   function modificar(idCurso) {
     load();
    $("#content").load("views/cursos/altaCurso.php?idCurso="+idCurso);
  }

  function eliminar(id, nombre) {
    swal({
			title: 'Atención!',
			text: "Eliminar curso de "+nombre+"?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Eliminarlo!'
		}).then(function () {
			$.ajax({
						type: "POST",
						dataType:"json",
						url: 'actions/cursos/eliminarCurso.php',
						data: 'id=' + id
				}).done(function(res){
					swal(
						'Eliminado!',
						'Se elimino a '+nombre+'.',
						'success'
					)
					$("#content").load( "views/cursos/cursos.php");
				});
		})
  }
  $("#btnCloseSearch").click(function(){
     buscarCursos($("#search").val());
  });
  $("#search").keyup(function(){
      window.clearTimeout(segundosAbuscar);
      segundosAbuscar = window.setTimeout(function() {
          buscarCursos($("#search").val());
      }, 350);
  });
  function buscarCursos(parametrosDeBusqueda){
    $("#contentConsultaLenguaje").empty();
      var htmlPreLoad = '<div class="progress">' +
        '<div class="indeterminate"></div>' +
        '</div>';
      $('#contentConsultaLenguaje').append(htmlPreLoad);
     $.ajax({
						type: "POST",
						dataType:"json",
						url: 'actions/cursos/consultarCursos.php',
						data: 'parametrosDeBusqueda=' + parametrosDeBusqueda
				}).done(function(res){
        $("#contentConsultaLenguaje").empty();
          $("#contentConsultaLenguaje").append(res.tabla);
          $("#contentConsultaLenguaje").append(res.script);
				});
  }
  $("#btnNuevoCurso").click(function() {
    load();
    $("#content").load("views/cursos/altaCurso.php");
  });
</script>