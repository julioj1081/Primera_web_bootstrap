<script src="../../js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="../../sweet-modal/jquery.sweet-modal.min.css" />
<script src="../../sweet-modal/jquery.sweet-modal.min.js"></script>
<?php
include_once '../php/conexion.php';
if(isset($_POST['subir'])){
  /*DATOS DEL FORMULARIO*/
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $nombre = $_POST['nombre_alumno'];
  $calificacion = '0 puntos'; 
  date_default_timezone_set('america/mexico_city');
  $fechaactual = getdate();
  //print_r($fechaactual);
  $fecha = "$fechaactual[weekday], $fechaactual[mday] de $fechaactual[month] de $fechaactual[year]";
  $matricula = $_POST['matricula'];

  /*Datos del archivo*/
  $nombre_archivo = $_FILES['archivo']['name'];
  $tipo = $_FILES['archivo']['type'];
  $tamanio = $_FILES['archivo']['size'];
  $ruta = $_FILES['archivo']['tmp_name'];

  /*CLONACION DEL ARCHIVO
  $destino = "../formulario/archivos/".$nombre_archivo;
*/
  $destino = "../archivos/".$nombre_archivo;

    if($nombre != ""){
      if(copy($ruta,$destino)){

        $conexion = new mysqli("localhost","root","","proyecto_web");
        $sql = "INSERT INTO tareas(
          Titulo_de_tarea,
          Descripcion_de_tarea,
          tamanio,
          tipo,
          nombre_archivo,
          matricula,
          nombre_alumno,
          Fecha_entrega,
          Calificacion)
        VALUES('$titulo',
          '$descripcion',
          '$tamanio',
          '$tipo',
          '$nombre_archivo',
          '$matricula',
          '$nombre',
          '$fecha',
          '$calificacion')";
          $resultado = $conexion->query($sql);
          if ($resultado) {
            #si lo hace regresa al index
            $message = "Se ha subido la tarea correctamente";
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
  }
 ?>
