<?php
SESSION_START();
$matricula = $_SESSION['matricula'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Entrega de tareas</title>
  <link rel="stylesheet" href="../sweet-modal/jquery.sweet-modal.min.css" />
  <script src="../sweet-modal/jquery.sweet-modal.min.js"></script>
  <style>
    @media screen and (max-width: 420px){
    .sweet-modal-box, .sweet-modal-box.prompt, .sweet-modal-box.alert {
        width: 100%;
        height: 100%;
        max-height: 100%;
        margin-top: 160px;
        margin-bottom: 0;
        border-radius: 0px;
    }
    }
  </style>
  <!--LIBRERIAS PARA EL TEXT AREA-->
  <script src="../tinymce/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({selector:'textarea'});
  </script>
</head>
<body>
<div class="form-group contenedor">
  <form action="formulario_alumnos/tarea_nueva.php" method="POST" enctype="multipart/form-data" >
    <table>
      <tr>
        <th>Titulo del trabajo</th>
      </tr>
      <tr>
        <td>
          <?php
          $conexion = mysqli_connect("localhost","root","","proyecto_web");
          $sql= "SELECT * FROM actividades_de_aprendizaje";
          $result = $conexion->query($sql);
            $combobit="<option>Selecciona una tarea</option>";

            while($row = $result->fetch_array(MYSQLI_ASSOC)){
              $combobit .="<option value='".$row['Titulo_de_actividad']."'>".$row['Titulo_de_actividad']."</option>";

            }
          ?>

          <select name="titulo" class="form-control">
            <?php echo $combobit; ?>
          </select>
        </td>
      </tr>
      <tr>
        <th>Comentario de tarea</th>
      </tr>
      <tr>
        <td><textarea class="form-control" name="descripcion" rows="10" cols="20"></textarea></td>
      </tr>
      <tr>
        <th>Matricula</th>
      </tr>
      <tr>
        <td><input  class="form-control" type="text" name="matricula" placeholder="Ingresa tu matricula" value="<?php echo $matricula;?>"></td>
      </tr>
      <tr>
        <th>Nombre completo</th>
      </tr>
      <tr>
        <?php
          //nombre del alumno
          $conexion = new mysqli("localhost","root","","proyecto_web");
          $datos= mysqli_query($conexion,"SELECT * FROM usuarios WHERE matricula='$matricula'");
          while($reg = mysqli_fetch_array($datos)){
            $nombre_completo = $reg['Nombre']." ".$reg['Apellidos'];
          }
        ?>
        <td><input class="form-control" type="text" name="nombre_alumno" placeholder="Nombre completo preferible" value="<?php echo $nombre_completo; ?>"></td>
      </tr>
      <tr>
        <td><label><b>Subir tarea</b></label></td>
      </tr>
      <tr>
        <td><label><input type="file" name="archivo"></label></td>
      </tr>
      
      <tr>
        <td>
          <label>
            <input type="submit" value="Entregar tarea" name="subir" id="subir" class="btn btn-primary">
          </label>
        </td>
      </tr>
    </table>
  </form>
</div>

</body>
<script type="text/javascript">

    window.ready(
      $.sweetModal({
          content: 'Advertencia subir trabajos en formato pdf o no podras recibir tu calificacion',
          icon: $.sweetModal.ICON_WARNING
     }));
  </script>
</html>
