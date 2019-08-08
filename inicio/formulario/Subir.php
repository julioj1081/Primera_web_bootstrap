<?php
$titulo = $_POST['titulo'];
$comentario = $_POST['comentario'];
$fecha = $_POST['fecha'];
$autor = $_POST['autor'];
$valor = $_POST['valor'];
date_default_timezone_set('america/mexico_city');
$fecha_actual = date("Y-m-d");

$conexion = new mysqli("localhost","root","","proyecto_web");
$query = "INSERT INTO actividades_de_aprendizaje (Titulo_de_actividad,Descripcion,Fecha_de_aplicacion,Fecha_de_entrega,Autor_de_actividad,valor_de_actividad)
VALUES('$titulo','$comentario','$fecha_actual','$fecha','$autor','$valor')";
$resultado = $conexion->query($query);
//mysql_close($conexion);
echo "ok";
 ?>
