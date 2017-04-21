<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta content="Eduardo Abad Tinoco" name="author" />
	<meta content="ABC de prueba de desempeño // eat.94.15@gmail.com // Cel. 6862224097" name="description" />
  <title>CRUD</title>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="stylesheet" href="css/sweetalert.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="grey lighten-3">
  <nav class="blue darken-2">
    <div class="nav-wrapper">
      <a href="/" class="brand-logo navLogo">Empleados</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li class="btnEmpleados"><a>Empleados</a></li>
        <li class="btncursos"><a>Cursos</a></li>
      </ul>
      <ul class="side-nav grey darken-4" id="mobile-demo">
        <ul class="collection grey darken-3 collectionSideNav">
          <li class="collection-item avatar grey darken-3">
            <img src="img/no-img.png" alt="" class="circle">
            <span class="title grey-text text-lighten-5">Eduardo Abad Tinoco</span>
            <p>Reclutador</p>
          </li>
        </ul>
        <li class="btnEmpleados"><a class="waves-effect waves-light grey-text text-lighten-5"><i class="icon-person grey-text text-lighten-5"></i>Empleados</a></li>
        <li class="btncursos"><a class="waves-effect waves-light grey-text text-lighten-5"><i class="icon-code grey-text text-lighten-5"></i>Lenguajes</a></li>
      </ul>
    </div>
  </nav>
  <br>
  <div class="container">
    <nav class="white none" id="navSearch">
      <div class="nav-wrapper">
        <form>
          <div class="input-field">
            <input id="search" class="grey-text text-darken-1" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons grey-text text-darken-1">search</i></label>
            <i class="material-icons grey-text text-darken-1" id="btnCloseSearch">close</i>
          </div>
        </form>
      </div>
    </nav>

    <div class="card">
      <div class="card-content" id="content"></div>
      <!--   Contenedor Principal     -->
    </div>
  </div>
  <script src="js/jQuery.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/sweetalert2.min.js"></script>

  <script>
    $(document).ready(function() {
      btnActive('.btnEmpleados');
      load();
      $("#content").load("views/empleados/empleados.php");
      $("#btnCloseSearch").click(function() {
        $("#search").val("");
      });
      $(".btnEmpleados").click(function() {
        btnActive('.btnEmpleados');
        load();
        $("#content").load("views/empleados/empleados.php");
      });
      $(".btncursos").click(function() {
        $("#search").val("");
        btnActive('.btncursos');
        load();
        $("#content").load("views/cursos/cursos.php");
      });
      $(".button-collapse").sideNav();
    })

    function btnActive(idbtn) {
      $(".btnEmpleados").removeClass("active");
      $(".btncursos").removeClass("active");
      $(idbtn).addClass("active");
    }

    function load() {
      $("#navSearch").hide();
      $("#content").empty();
      var htmlLoad = '<div class="content-load center-align">' +
        '<div class="preloader-wrapper big active">' +
        '<div class="spinner-layer spinner-blue-only">' +
        '<div class="circle-clipper left">' +
        '<div class="circle"></div>' +
        '</div>' +
        '<div class="gap-patch">' +
        '<div class="circle"></div>' +
        '</div>' +
        '<div class="circle-clipper right">' +
        '<div class="circle"></div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
      $('#content').append(htmlLoad);
    }
  </script>
</body>

</html>