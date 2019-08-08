<?php
SESSION_START();
$matricula = $_SESSION['matricula'];
$conexion = mysqli_connect("localhost","root","","proyecto_web");
$datos= mysqli_query($conexion,"SELECT * FROM usuarios WHERE matricula = '$matricula'");
#Consulta de sql
//INICIAMOS UNA CONSULTA PARA OBTENER LOD DATOS DEL ALUMNO
while($reg = mysqli_fetch_array($datos)){
    $matricula = $reg[1];
    $Nombre = $reg[2];
    $Apellidos = $reg[3];
    $Correo = $reg[5];
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <!--LIBRERIAS PARA sweetModal-->
  <script src="../js/jquery-1.10.2.min.js"></script>
  <link rel="stylesheet" href="../sweet-modal/jquery.sweet-modal.min.css" />
  <script src="../sweet-modal/jquery.sweet-modal.min.js"></script>

  <!--LIBRERIAS PARA EL TEXT AREA-->
  <script src="../tinymce/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({selector:'textarea'});
  </script>

  <style media="screen">
    body{
      margin-top: auto;
      margin-bottom: auto;

    }
    .contenedor{
      max-width: 900px;
      margin: 0 auto;
      margin-top: 3%;
      margin-bottom: 3%;
    }
  </style>
  <!--SCRIPT PARA SUBIR EL ARCHIVO USANDO JS.POST-->

  <script type="text/javascript">
  $(document).ready(function(){
    $("#enviar").click(function(){
      var titulo=$("#titulo").val();
      var fecha=$("#fecha").val();
      var autor=$("#autor").val();
      var valor=$("#valor").val();
      var comentario=tinyMCE.get('comentario').getContent();
      $.post("formulario/Subir.php",{
        titulo:titulo,
        fecha:fecha,autor:autor,comentario:comentario,valor:valor},
function(datos){
alert(datos);
if(datos=="ok"){

    $.sweetModal({
  	   content: 'La tarea se a subido correctamente actualiza la pagina o sustitulle los campos si quieres subir otra tarea.',
  	 icon: $.sweetModal.ICON_SUCCESS
    });
    setTimeout(function () {
      window.location.href = "http://localhost/web/inicio/plantilla_administrador.php#/Nueva_tarea";
    }, 1500);

}else{
  alert("Error, al subir la tarea");
}
});

});
});
  </script>

</head>
<body>
  <div class="form-group contenedor">
  <form method="post">
    <br>
    <label for="">Titulo de la tarea</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribe el nombre o titulo de la actividad">
<br>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Fecha de entrega: </label>
    <div class="col-sm-10">
      <input border="1px" type="date"  name="fecha" id="fecha"  min="2019-06-16">
    </div>
  </div>
<br>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Autor: </label>
    <div class="col-sm-1">
      <input type="text" readonly  class="form-control-plaintext" id="autor" name="autor" placeholder="Autor"
      value="<?php echo $Nombre; ?>">
    </div>
  </div>



<br>

      <textarea id="comentario" cols="auto" rows="10" name="comentario"></textarea>
<br>
      <div class="form-group row">
        <label  class="col-sm-3 col-form-label">Valor de la actividad: </label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="valor" name="valor" placeholder="ejemplo 1,2,3 puntos">
        </div>
      </div>



    <td>
      <input type="button" value="Subir tarea" name="enviar" id="enviar" class="btn btn-success">
    </td>
    <td>
      <input type="reset" value="Descartar" class="btn btn-danger">
    </td>
    <td>
    <button type="button" class="btn btn-dark" class="btn btn-outline-dark" id="tareas">Ver todas las tareas subidas</button>
    </td>
  </form>
</div>
</body>
</html>
<script type="text/javascript">
$("#tareas").click(function(){
    window.location="http://localhost/web/inicio/plantilla_administrador.php#/tabla";
});
</script>
