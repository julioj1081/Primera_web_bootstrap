<?php
    $conexion = mysqli_connect("localhost","root","","proyecto_web");
    $query = mysqli_query($conexion, "SELECT * FROM actividades_de_aprendizaje");

    /* CREAR UNA PAGINA PARA CADA COSA */

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consulta de calificaciones</title>
    <style media="screen">
      .disp{
        display: flex;
        flex-wrap: wrap;
      }
    </style>
  </head>
  <body>
    <h3>Actividades de todos los alumnos</h3>

    <div class="tareas ">


      <table class="table table-bordered">
          <p style="float:right; font-size:24px; margin-right:3%;">actividades_de_aprendizaje</p>

          <tr>
            <td>Trabajos actualmente</td>
            <?php while($datos = mysqli_fetch_array($query)){?>
              <!--TITULO DE TAREAS-->
                <td><?php echo $datos[1]?></td>
            <?php }?>
          </tr>

          <th>Alumnos</th>






        </table>

        <table class="table table-bordered" style="width:100%;">
                        <!--Aqui se muestra los NOMBRES-->
                        <tr>
                          <td>
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT DISTINCT Nombre_alumno FROM tareas");

                            while($res = mysqli_fetch_array($query1)){
                              //cho $res['Nombre_alumno'];

                              echo "$res[0] | ";
                              $query2 = mysqli_query($conexion, "SELECT Titulo_de_tarea, calificacion FROM tareas WHERE nombre_alumno = '$res[0]';");
                              //$cont=1;
                              while($tarea2 = mysqli_fetch_array($query2)){
                                //echo "Actividad No $cont,                 ". $tarea2[0].",       ";
                                echo ",<strong>$tarea2[0]</strong> : $tarea2[1] ";
                                //$cont+=1;
                              }
                              echo "<br>";

                            }
                            ?>
                          </td>


                        </tr>
        </table>




    </div>

  </body>
</html>
