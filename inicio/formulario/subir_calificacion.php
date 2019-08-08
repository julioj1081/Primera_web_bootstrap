<?php
$matricula = $_POST['matricula'];
$calificacion = $_POST['calificacion'];
$conexion = new mysqli("localhost","root","","proyecto_web");
$query = "UPDATE tareas SET Calificacion='$calificacion' WHERE matricula = '$matricula'";
$resultado = $conexion->query($query);
echo '
<script language="javascript">
alert("La calificacion se ha subido.");
window.history.back();
</script>';

?>
