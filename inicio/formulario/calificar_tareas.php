<!DOCTYPE html>
<!-- REFERENCIA USAR ESTE VIDEO
https://www.youtube.com/watch?v=AD9OXn6ZazU
-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      h3{
        font-weight: 400;
        text-align: center;
      }
      #data_table{
        width: 76%;
        margin: 0 auto;
        margin-top: 22px;
      }
    </style>

  </head>
  <body>
    <br>
    <h3>Seleccione una tarea</h3>
    <div class="table-responsive-lg">

    <table id="data_table" class="table table-bordered">
    <thead class="table-light">

    <th>Titulo de la tarea</th>
    <th>Descripcion de tarea</th>
    <th>Se subio el dia</th>
    <th>Ultimo dia de entrega</th>
    <th>Valor de actividad</th>

  </thead>

    <?php
    $conexion = new mysqli("localhost","root","","proyecto_web");
    $datos= mysqli_query($conexion,"SELECT * FROM actividades_de_aprendizaje");

    while($reg = $datos ->fetch_assoc()){
      echo "<tr>";

      echo "<td> <a href='formulario/tareas_entregadas_por_los_alumnos.php?tarea=".$reg['Titulo_de_actividad']."'>".$reg['Titulo_de_actividad']."</a> </td>";

      echo "<td>"; echo $reg['Descripcion']; echo "</td>";
      echo "<td>"; echo $reg['Fecha_de_aplicacion']; echo "</td>";
      echo "<td>"; echo $reg['Fecha_de_entrega']; echo "</td>";
      echo "<td>"; echo $reg['valor_de_actividad']; echo "</td>";
    echo "</tr>";

    }
    ?>
  </table>
</div>
  <div id="contenido" >
  </div>
  </body>

</html>
