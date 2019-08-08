<?php
  SESSION_START();
  $matricula = $_SESSION['matricula'];
  $Contraseña = $_SESSION['contrasena'];
  echo "tu matricula es: ".$matricula;
 ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Mostrar tareas subidas</title>
    </head>
    <body>
        <div class="table-responsive-lg">

      <table id="data_table" class="table table-striped">
  <thead>
  <tr>
  <th>Tarea entregadas</th>
  <th>Titulo de actividad</th>
  <th>Descripcion</th>
  <th>Nombre del archivo</th>
  <th>Entregada el dia</th>
  <th>Puntos obtenidos</th>
  <th>Modificar tarea</th>
  </tr>
  </thead>
  <tbody>
  <?php
  $conexion = new mysqli("localhost","root","","proyecto_web");
  $datos= mysqli_query($conexion,"SELECT * FROM tareas WHERE matricula='$matricula'");

  while($reg = mysqli_fetch_array($datos)){
  ?>
  <tr id="<?php echo $developer ['idTareas'];?>">
    <td><?php echo $reg ['idTareas']; ?></td>
    <td><?php echo $reg ['Titulo_de_tarea']; ?></td>
    <td><?php echo $reg ['Descripcion_de_tarea']; ?></td>
    <td><?php echo $reg ['nombre_archivo']; ?></td>
    <td><?php echo $reg ['Fecha_entrega']; ?></td>
    <td><?php echo $reg ['Calificacion']; ?></td>
    <td><a href="formulario_alumnos/modificar_tarea.php?id=<?php echo $reg ['idTareas'] ?>">Modificar</a></td>
  </tr>
  <?php } ?>
  </tbody>
  </table>
</div>
    </body>
  </html>
