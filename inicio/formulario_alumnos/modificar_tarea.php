<?php
SESSION_START();
$matricula = $_SESSION['matricula'];
$rec = $_GET['id'];
// AQUI HACEMOS LA CONSULTA
    $conexion = new mysqli("localhost","root","","proyecto_web");
    $datos= mysqli_query($conexion,"SELECT * FROM tareas WHERE idTareas='$rec'");
    while($reg = mysqli_fetch_array($datos)){
      $Titulo = $reg['Titulo_de_tarea'];
      $desc = $reg['Descripcion_de_tarea'];
    }
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
  <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../bootstrap/css/modern-business.css" rel="stylesheet">

  <script type = "text/javascript" src = "../../js/jquery-1.10.2.min.js"></script>
  <script type = "text/JavaScript" src = "../../js/sammy-0.5.4.min.js"></script>
  <!--LIBRERIAS PARA EL TEXT AREA
<script src="../../tinymce/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({selector:'textarea'});
  </script>-->
  

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
              Portafolio de evidencias
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="http://localhost/web/inicio/plantilla_general.php#/tareas_entregadas">Cancelar y regresar</a>
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

  <!-- Page Content -->
  <div class="container">
    <ol class="breadcrumb" align="center">
      <li class="breadcrumb-item">

      </li>


        <!--LLENADO DE DATOS CONFORME A LA TABLA -->
        <?php
        //INICIAMOS UNA CONSULTA PARA OBTENER LOD DATOS DEL ALUMNO
        $conexion = mysqli_connect("localhost","root","","proyecto_web");

        $datos= mysqli_query($conexion,"SELECT * FROM usuarios WHERE matricula = '$matricula'");
        //LEER TODOS LOS DATOS
        while($reg = mysqli_fetch_array($datos)){
        echo "<p>Bienvenido alumno $reg[Nombre] $reg[Apellidos] disfruta de nuestra plataforma.</p>";
        }
      ?>
      <div id="foto_perfil">
        <?php
        $conexion = mysqli_connect("localhost","root","","proyecto_web");
        $datos= mysqli_query($conexion,"SELECT * FROM usuarios WHERE matricula = '$matricula'");
        while($reg = mysqli_fetch_array($datos)){
          print "<img width='300' src='data:image/jpg;base64,".base64_encode($reg['Foto'])."'/>";
        }
        ?>
      </div>
    </ol>

    <div id="contenido">
    <form action="./tarea_modificada.php?id=<?php echo $rec;?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Titulo del trabajo</label>
        <input readonly type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresa un titulo" value="<?php echo $Titulo; ?>">
      </div>

      <div class="form-group">
        <label for="">Ingresa un comentario</label>
        <textarea class="form-control" name="descripcion" rows="10" cols="20" required></textarea>
      </div>

      <div class="form-group">
        <label for="">Subir un archivo</label>
        <input type="file" name="archivo" required>
        <br>
        <p>Recuerda subir tu archivo en formato pdf</p>
        <label>
            <input type="submit" value="Modificar tarea" name="subir" id="subir" class="btn btn-primary">
        </label>
      </div>
    </form>

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019-2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
