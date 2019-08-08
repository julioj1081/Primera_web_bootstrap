<?php
session_start();
$id = $_SESSION['id'];
$titulo = $_POST['titulo'];
$comentario = $_POST['comentario'];
$fecha = $_POST['fecha'];
$autor = $_POST['autor'];
$valor = $_POST['valor'];
date_default_timezone_set('america/mexico_city');
$fecha_actual = date("Y-m-d");

$conexion = new mysqli("localhost","root","","proyecto_web");
$query = "UPDATE actividades_de_aprendizaje SET Titulo_de_actividad='$titulo', Descripcion = '$comentario', Fecha_de_aplicacion = '$fecha_actual', Fecha_de_entrega ='$fecha' ,Autor_de_actividad = '$autor' ,valor_de_actividad = '$valor' WHERE idActividad = '$id'";
$resultado = $conexion->query($query);
//mysql_close($conexion);
echo 'ok';
 ?>
