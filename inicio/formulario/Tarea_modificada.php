<?php
include '../php/conexion.php';
$numero = $_GET['no'];
//---> Aqui buscaremos los registros
$conexion = new mysqli("localhost","root","","proyecto_web");
$query = "SELECT * FROM actividades_de_aprendizaje WHERE idActividad='$numero'";
$resultado = $conexion->query($query);
while($datos = mysqli_fetch_array($resultado)){
  SESSION_START();
  $_SESSION['id'] = $datos['idActividad'];
  $id= $datos['idActividad'];
  $Titulo = $datos['Titulo_de_actividad'];
  $Desc = $datos['Descripcion'];
  $Fecha1 = $datos['Fecha_de_aplicacion'];
  $Fecha2 = $datos['Fecha_de_entrega'];
  $Autor = $datos['Autor_de_actividad'];
  $Valor = $datos['valor_de_actividad'];
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
   <!--<script src="php/jquery.js"></script>-->
   <script type="text/javascript">
   var ratpack = $.sammy(function(context) {
     this.element_selector = '#contenido';

  });

   </script>

   <style media="screen">
   #foto_perfil{
     margin: auto;
     margin-left: 70%;
     float: right;
   }
   #foto_perfil{
     display: contents;
     margin: auto;
   }
   #foto{
     padding: 14px;
     width: 45%;
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
   <!--LIBRERIAS PARA EL TEXTAREA-->
   <script src="../../tinymce/js/tinymce/tinymce.min.js"></script>
   <script type="text/javascript">
     tinymce.init({selector:'textarea'});
   </script>

   <script type="text/javascript">
   $(document).ready(function(){
     $("#enviar").click(function(){
       var titulo=$("#titulo").val();
       var fecha=$("#fecha").val();
       var autor=$("#autor").val();
       var valor=$("#valor").val();
       var comentario=tinyMCE.get('comentario').getContent();
       $.post("../formulario/Update.php",{
         titulo:titulo,fecha:fecha,autor:autor,comentario:comentario,valor:valor},
       function(datos){
         if(datos=="ok"){
           alert("La tarea a sido modificada");
         }
         window.location.href="http://localhost/web/inicio/plantilla_administrador.php#/tabla";
       });
 });
 });
   </script>

 </head>

 <body>

   <!-- Navigation -->
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
     <div class="container">
       <a class="navbar-brand" href="../../index.html">Start Bootstrap</a>
       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav ml-auto">

           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Salir de aqui
             </a>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
               <a class="dropdown-item" href="../../index.html">volver al inicio</a>
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
     <ol class="breadcrumb">
       <li class="breadcrumb-item">

       </li>


         <!--LLENADO DE DATOS CONFORME A LA TABLA -->
         <?php

         $conexion = mysqli_connect("localhost","root","","proyecto_web");
         $datos= mysqli_query($conexion,"SELECT * FROM usuarios WHERE Perfil = 'Profesor'");

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

     <form method="post">
       <h3><?php echo "Modificando de tarea numero #$id";?></h3>
<br>
       <label for="">Titulo de la tarea</label>
       <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo de la actividad" value="<?php echo $Titulo; ?>">
<br>

       <br>
       <label>Fecha de entrega:</label>
           <input type="date" class="form-control" name="fecha" id="fecha"  min="2019-06-16"
           value="<?php echo $Fecha2; ?>">
       <br>

       <br>
       <label>
         Autor destacado
       </label>
           <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor"
             value="<?php echo $Autor; ?>">
       <br>

         <textarea id="comentario" cols="auto" rows="10" name="comentario">
           <?php echo $Desc; ?>
         </textarea>

        <br>
        <label>Valor de la actividad</label>
                 <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor de la actividad" value="<?php echo $Valor;?>">


<td>
  <input style="margin-bottom:20px; margin-top:20px; margin-left:20px; margin-right:20px;" type="button" value="Modificar tarea" name="enviar" id="enviar" class="btn btn-success">
</td>

<td>
  <input style="margin-bottom:20px; margin-top:20px; margin-left:20px; margin-right:20px;" type="reset" value="resetear" class="btn btn-danger">
</td>

     </form>
   </div>
   <!-- /.container -->

   <!-- Footer -->
   <footer class="py-5 bg-dark">
     <div class="container">
       <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
     </div>
     <!-- /.container -->
   </footer>

   <!-- Bootstrap core JavaScript -->
   <script src="../../js/jquery/jquery.min.js"></script>
   <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>

 </body>

 </html>
