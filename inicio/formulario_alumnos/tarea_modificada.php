<?php
if(isset($_POST['subir'])){
  /*DATOS DEL FORMULARIO*/
  $rec = $_GET['id'];
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];

  date_default_timezone_set('america/mexico_city');
  $fechaactual = getdate();
  //print_r($fechaactual);
  $fecha = "$fechaactual[weekday], $fechaactual[mday] de $fechaactual[month] de $fechaactual[year]";

  /*Datos del archivo*/
  $nombre_archivo = $_FILES['archivo']['name'];
  $tipo = $_FILES['archivo']['type'];
  $tamanio = $_FILES['archivo']['size'];
  $ruta = $_FILES['archivo']['tmp_name'];

  $destino = "../archivos/".$nombre_archivo;

  if(copy($ruta,$destino)){
    $conexion = new mysqli("localhost","root","","proyecto_web");
    $query = "UPDATE tareas SET Titulo_de_tarea='$titulo',  Descripcion_de_tarea='$descripcion',
    tamanio='$tamanio', tipo='$tipo', nombre_archivo='$nombre_archivo', Fecha_entrega = '$fecha'  WHERE idTareas = '$rec'";
    $resultado = $conexion->query($query);
          if ($resultado) {
            #si lo hace regresa al index
            $message = "Se ha modificado la tarea correctamente";
            echo "<script type='text/javascript'>
              alert('$message');
              window.history.back();
            </script>";
          }else{
            echo "alert('Ocurrio un error');";
          }
     
        }else{
            "Error al guardar";
          }
  }
 ?>
