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
    <title>Comenta tareas de alumnos</title>
</head>
<body>
    <h5>Seleccione un tarea de un alumno</h5>
    <table class="table table-bordered">
        <th>Titulo de la tarea</th>
        <th>Subido por el alumno</th>
        <th>Deja tu opinion</th>
        <th>Comentario del alumno</th>
        <th>Lo subio el dia</th>
        <?php
       


        $conexion = mysqli_connect("localhost","root","","proyecto_web");
        $query= mysqli_query($conexion,"SELECT * FROM tareas WHERE not matricula = '$matricula'");
        while($datos = mysqli_fetch_array($query)){?>
            <tr>

                <td><?php echo $datos[1]; ?></td>
                <td><?php echo $datos[7]; ?></td>
                <td><a href="./formulario/archivo2.php?idTareas=<?php echo $datos['idTareas']?>" target="_blink"><?php echo $datos['nombre_archivo']; ?></a></td>
                <td><?php echo $datos[2]; ?></td>                
                <td><?php echo $datos[8]; ?></td>                
            </tr>

          <?php  }?>

    </table>
</body>
</html>