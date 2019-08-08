<?php echo "Tabla de tareas pendientes";
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Mostrar tareas subidas</title>
   </head>
   <body>
     <div class="table-responsive">

     <table id="data_table" class="table table-striped">
 <thead>
 <tr>
 <th>Tarea No</th>
 <th>Titulo de actividad</th>
 <th>Descripcion</th>
 <th>Se subio el dia</th>
 <th>Ultimo dia de entrega</th>
 <th>Valor de actividad</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $conexion = new mysqli("localhost","root","","proyecto_web");
 $datos= mysqli_query($conexion,"SELECT * FROM actividades_de_aprendizaje");

 while($reg = mysqli_fetch_array($datos)){
 ?>
 <tr id="<?php echo $developer ['idTareas'];?>">
   <td><?php echo $reg ['idActividad']; ?></td>
   <td><?php echo $reg ['Titulo_de_actividad']; ?></td>
   <td><?php echo $reg ['Descripcion']; ?></td>
   <td><?php echo $reg ['Fecha_de_aplicacion']; ?></td>
   <td><?php echo $reg ['Fecha_de_entrega']; ?></td>
   <td><?php echo $reg ['valor_de_actividad']; ?></td>
 </tr>
 <?php } ?>
 </tbody>
 </table>
</div>
   </body>
 </html>
