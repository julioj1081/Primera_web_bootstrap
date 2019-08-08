 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Alumnos impartidos</title>
     <style media="screen">
       #data_table{
         max-width: 960px;
         margin: 0 auto;
       }
       #btn-borrar{
         display: flex;
       }
       #caja{
         border: 1px dashed rgb(242, 79, 8);
         flex-flow: column;
         margin-inline-start:30px;
         margin-bottom: 45px;
         margin-top: 50px;
       }
       h4{
         text-align: center;
       }
     </style>
   </head>
   <body>
     <div class="table-responsive-xl">
     <table id="data_table" class="table table-striped" >
  <thead>
    <tr>
      <th>ID</th>
      <th>Matricula</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Correo</th>
    </tr>
  </thead>
<tbody>
      <?php
      $conexion = mysqli_connect("localhost","root","","proyecto_web");
      $datos= mysqli_query($conexion,"SELECT * FROM usuarios WHERE perfil='Alumno'");
      while($reg = mysqli_fetch_array($datos)){
      ?>
        <tr id="<?php echo $developer ['idUsuario'];?>">
            <td><?php echo $reg ['idUsuarios']; ?></td>
            <td><?php echo $reg ['matricula']; ?></td>
            <td><?php echo $reg ['Nombre']; ?></td>
            <td><?php echo $reg ['Apellidos']; ?></td>
            <td><?php echo $reg ['Correo']; ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
      <div id="btn-borrar">
        <!---->
        <div id="caja">
          <h4>Dar de baja un alumno</h4>
          <form action="formulario/borrar.php" method="post">
              <input type="text" name="id" style="padding:1px; margin:12px;" placeholder="MATRICULA DEL ALUMNO">
              <input type="submit" name="borrar" style="padding:1px; margin:12px;"value="borrar alumno">
          </form>
        </div>
      </div>
   </body>
 </html>
