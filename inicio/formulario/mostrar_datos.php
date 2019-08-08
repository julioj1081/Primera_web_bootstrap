<?php

    $conexion = mysqli_connect("localhost","root","","proyecto_web");
    $consulta= mysqli_query($conexion,"SELECT * FROM comentarios");
        echo "<table class='table table-striped' style='text-align:center;'>
        <tr>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>idTarea</th>
            <th>Titulo de tarea</th>
            <th>Nombre del comentador</th>
            <th>Comentario o opinion </th>
        </tr>";

        while($reg = mysqli_fetch_array($consulta)){
            echo "
            <tr>
                <th>$reg[0]</th>
                <th>$reg[1]</th>
                <th>$reg[2]</th>
                <th>$reg[3]</th>
                <th id='nombre' data-id_usuario='".$reg["idTarea"]."' contenteditable> ".$reg[4]."</th>
                <th id='comentario' data-id_comentario='".$reg["idTarea"]."' contenteditable> ".$reg[5]."</th>
                <th><button id='eliminar'>Borrar comentario</button></th>
            </tr>
            ";
        }
        echo "
        <tr>
          <td></td>
          <td id='nombre_add' contenteditable></td>
          <td id='comentario_add' contenteditable></td>
          <td><button id='add'>Agregar</button></td>
        </tr>";
        //minuto 16:50
        echo "</table>";

?>
