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
        font-weight: 350;
        text-align: center;

      }
    </style>
  </head>
  <body>
    <h3>Tareas que has subido</h3>
    <div class="table-responsive-lg">

    <table id="data_table" class="table table-bordered">
    <thead class="table-light">
    <th>No.</th>
    <th>Titulo</th>
    <th>Descripcion</th>
    <th>Se subio</th>
    <th>Ultimo dia</th>
    <th>Subido</th>
    <th>Valor de actividad</th>
    <th></th>
    <th></th>
  </thead>

    <?php
    $conexion = new mysqli("localhost","root","","proyecto_web");
    $datos= mysqli_query($conexion,"SELECT * FROM actividades_de_aprendizaje");

    while($reg = $datos ->fetch_assoc()){
      echo "<tr>";
      echo "<td>"; echo $reg['idActividad']; echo "</td>";
      echo "<td>"; echo $reg['Titulo_de_actividad']; echo "</td>";
      echo "<td>"; echo $reg['Descripcion']; echo "</td>";
      echo "<td>"; echo $reg['Fecha_de_aplicacion']; echo "</td>";
      echo "<td>"; echo $reg['Fecha_de_entrega']; echo "</td>";
      echo "<td>"; echo $reg['Autor_de_actividad']; echo "</td>";
      echo "<td>"; echo $reg['valor_de_actividad']; echo "</td>";
      /*
      */
      echo "<td> <a href='formulario/Tarea_modificada.php?no=".$id = $reg['idActividad']."'><button type='button' class='btn btn-success'>Modificar</button></a> </td>";
      echo "<td> <a href='formulario/pregunta.php?no=".$reg['idActividad']."'><button type='button' class='btn btn-danger'>Eliminar</button></a></td>";
      echo "</tr>";

    }
    ?>
  </table>
</div>
  <div id="contenido" >

  </div>
  </body>
<script type="text/javascript">
setTimeout(function () {
  location.reload();
}, 100000);

</script>


</html>
