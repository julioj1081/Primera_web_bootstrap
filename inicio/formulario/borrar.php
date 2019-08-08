<?php
$conexion = new mysqli("localhost","root","","proyecto_web");
$query = "DELETE FROM usuarios WHERE matricula=".$_POST['id'];
$resultado = $conexion->query($query);

if ($resultado) {
  #si lo hace regresa al index
  echo '<script language="javascript">
  alert("Se ha podido borrar el registro");
  window.location.href="http://localhost/web/inicio/plantilla_administrador.php#/Alumnos_impartidos";
  </script>';
}else{
  echo '<script language="javascript">
   alert("Ocurrio un error");
  window.location.href="http://localhost/web/inicio/plantilla_administrador.php#/Alumnos_impartidos";
  </script>';
}?>
