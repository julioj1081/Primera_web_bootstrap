<?php

    /*CHECAR LA LISTA

    /*https://www.youtube.com/watch?v=aZ8Alp7kKlo&t=861s
    $conexion = mysqli_connect("localhost","root","","proyecto_web");
    $datos= mysqli_query($conexion,"SELECT * FROM tareas");
    */
  ?>

<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        <title>Tareas por calificar</title>
        <style media="screen">
          #data_table{
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
          }
          h2{
            padding: 3px;
            font-size: 2rem;
            text-align: center;
            color: rgba(62, 63, 69, 0.99);
          }
        </style>
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
            width: 100%;
            margin: 12px auto;
          }
        }
        </style>


        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="../../bootstrap/css/modern-business.css" rel="stylesheet" />

        <script type="text/javascript" src="../../js/jquery-1.10.2.min.js"></script>
        <script type="text/JavaScript" src="../../js/sammy-0.5.4.min.js"></script>

    </head>
    <body>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">Start Bootstrap</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Regresar
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                  <a class="dropdown-item" href="http://localhost/web/inicio/plantilla_administrador.php#/tareas_entregadas">Revisar otra tarea</a>
                  <a class="dropdown-item" id="cerrar">Cerrar sesion</a>
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

          <div id="foto_perfil">
            <?php
              $conexion = mysqli_connect("localhost","root","","proyecto_web");
              $datos = mysqli_query($conexion, "SELECT * FROM usuarios WHERE perfil='Profesor'");
              while($reg = mysqli_fetch_array($datos)){

                echo "<br><strong>Atencion!!</strong><p>Bienvenido Profesor $reg[Nombre] $reg[Apellidos].</p>";
                print "<img id='foto' src='data:image/jpg;base64,".base64_encode($reg['Foto'])."'/>";
                echo "<strong>Instrucciones.</strong><p> Haga click en el titulo de la tarea para poder abrir el documento y calificar las tareas de los alumnos.</p>";
                echo "<strong>Tip.</strong><p>Se recomienda trabajar en un entorno de escritorio y no en el movil si va a calificar trabajos.</p>";
              }
            ?>
          </div>
        </ol>

      </div>
    </div>
      <!-- /.container -->
      <h2>Tareas entregadas por los alumnos</h2>
      <br><br><br>
      <div class="table-responsive">
        <table id="data_table"  class="table table-sm">
            <tr  class="table-active">

              <td>Titulo del trabajo</td>
              <td>Comentario acerca de la tarea</td>
              <td>Nombre del archivo</td>
              <td>Matricula</td>
              <td>Nombre de alumno</td>
              <td>Se entrego el dia</td>
              <td>Calificacion obtenida</td>
            </tr>
        <?php
        $tarea_seleccionada = $_GET['tarea'];


        $conexion = mysqli_connect("localhost","root","","proyecto_web");
        $query= mysqli_query($conexion,"SELECT * FROM tareas WHERE Titulo_de_tarea = '$tarea_seleccionada'");
        while($datos = mysqli_fetch_array($query)){?>
            <tr>

                <td><?php echo $datos[1]; ?></td>
                <td><?php echo $datos[2]; ?></td>
                <td><a href="../formulario/archivo.php?idTareas=<?php echo $datos['idTareas']?>" target="_blink"><?php echo $datos['nombre_archivo']; ?></a></td>
                <td><?php echo $datos[6]; ?></td>
                <td><?php echo $datos[7]; ?></td>
                <td><?php echo $datos[8]; ?></td>
                <td><?php echo $datos[9]; ?></td>
            </tr>

          <?php  }?>

        </table>
      </div>
      <!--SALTOS-->
      <br><br><br>

      <!-- Footer -->
      <footer class="py-5 bg-dark">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
        </div>
        <!-- /.container -->
      </footer>

      <script src="../../js/jquery.min.js"></script>
      <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#cerrar").click(function(){
            alert("cerrando la session");
            window.location.replace("http://localhost/web/#");
          });
        });
      </script>
      

    </body>
</html>
