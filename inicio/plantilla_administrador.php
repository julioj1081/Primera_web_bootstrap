<?php
SESSION_START();
$matricula = $_SESSION['matricula'];
$Contraseña = $_SESSION['contrasena'];

//echo "<p>Matricula $matricula contraseña $Contraseña</p>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Modern Business - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS -->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../bootstrap/css/modern-business.css" rel="stylesheet">

  <script type = "text/javascript" src = "../js/jquery-1.10.2.min.js"></script>
  <script type = "text/JavaScript" src = "../js/sammy-0.5.4.min.js"></script>
  <!--<script src="php/jquery.js"></script>
-->
  <script type="text/javascript">
  var ratpack = $.sammy(function(context) {
    this.element_selector = '#contenido';

    this.get('#/tareas_entregadas', function(context){
    $("#contenido").load('formulario/calificar_tareas.php');
  });

    this.get('#/Configuracion', function(context){
      $("#contenido").load("./Configuracion_de_perfil.php");
    });

    this.get('#/Acerca_de', function(context){
      $("#contenido").load('./about.html');
    });
    this.get('#/Nueva_tarea', function(context){
      $("#contenido").load('formulario/Tarea_nueva.php');
    });
    this.get('#/Alumnos_impartidos', function(context){
      $("#contenido").load('formulario/Alumnos_impartidos.php');
    });
    this.get('#/tabla', function(context){
      $("#contenido").load('tabla.php');
    });
    this.get('#/Tarea_modificada', function(context){
      $("#contenido").load('formulario/Tarea_modificada.php');
    });

    this.get('#/ver_calificaciones', function(context){
      $("#contenido").load('formulario/ver_calificaciones.php');
    });
    //COMENTAR TAREA
    this.get('#/Comentar_tarea', function(context){
      $("#contenido").load('formulario_alumnos/Comentar_tarea.php');
    });

 });

  $(function(){
    ratpack.run('#/');
  });

  </script>

  <style media="screen">
  #foto_perfil{
    display: block;
    margin: 0 auto;
  }
  #foto{
    float: right;
    padding: 4px;
    width: 24%;
    margin: 0 auto;
  }
  @media screen and (max-width:945px) {
    #foto{
      width: 60%;
      margin: 0 auto;
    }
  }
  @media screen and (max-width:426px) {
    #foto{
      width: 80%;
      margin: 0 auto;
    }
  }
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../index.html">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Nueva Tarea
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="#/tareas_entregadas">1 Calificar Trabajos</a>
              <a class="dropdown-item" href="#/ver_calificaciones">2 Consultar Actividades de aprendizaje</a>
              <a class="dropdown-item" href="#/Acerca_de">3 Acerca de este website</a>
              <a class="dropdown-item" href="#/Configuracion">4 Configuracion de perfil</a>
              <a class="dropdown-item" href="#/Nueva_tarea">5 Subir una nueva tarea</a>
              <a class="dropdown-item" href="#/tabla">6 Editar tareas</a>
              <a class="dropdown-item" href="#/Alumnos_impartidos">7 Alumnados impartidos</a>
              <a class="dropdown-item" href="#/Comentar_tarea">8 Comenta una tarea</a>

              <a class="dropdown-item" href="../index.html">Cerrar session
              <!--?php //session_destroy();
              ?> -->
 </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Blog
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="https://www.google.com.mx/">Ir a google</a>
              <a class="dropdown-item" href="https://www.netacad.com/">Ir a netacad</a>
              <a class="dropdown-item" href="blog-post.html">Blog Post</a>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div id="contenido">
  <!-- Page Content -->
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">

      </li>


        <!--LLENADO DE DATOS CONFORME A LA TABLA -->
        <?php

        $conexion = mysqli_connect("localhost","root","","proyecto_web");
        $datos= mysqli_query($conexion,"SELECT * FROM usuarios WHERE matricula = '$matricula'");

        //LEER TODOS LOS DATOS
        while($reg = mysqli_fetch_array($datos)){
        echo "<p>Bienvenido Profesor $reg[Nombre] $reg[Apellidos] que vamos a hacer el dia de hoy.</p>";
        }
      ?>
      <div id="foto_perfil">
        <?php
          $conexion = mysqli_connect("localhost","root","","proyecto_web");
          $datos = mysqli_query($conexion, "SELECT * FROM usuarios WHERE perfil='Profesor'");
          while($reg = mysqli_fetch_array($datos)){

            print "<img id='foto' src='data:image/jpg;base64,".base64_encode($reg['Foto'])."'/>";
          }
        ?>
      </div>
    </ol>
    <!--SALTOS DE ESPACIO-->
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br>


  </div>
</div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript
 -->
 <script src="../js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
