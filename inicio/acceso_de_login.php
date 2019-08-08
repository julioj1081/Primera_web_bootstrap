<?php
//SIMULAREMOS UN METODO
#variables recividas del login
    $matricula = $_POST['Matricula'];
    $hash=$_POST["hash"];

    SESSION_START();
    $_SESSION['matricula'] = $matricula;
    $_SESSION['contrasena'] = $hash;

    $conexion = mysqli_connect("localhost","root","","proyecto_web");
    $resultado= mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE matricula='$matricula' AND Contrasena='$hash'");

    $resultado2= mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE matricula='$matricula' AND Contrasena='$hash' AND Perfil='Profesor'");

    ///CHECAR UN SQL QUE NOS PERMITA SER PROFESOR
    if (mysqli_num_rows($resultado)>0){
      header("location: plantilla_general.php") ;
    }if(mysqli_num_rows($resultado2)>0){
    header("location: plantilla_administrador.php");
    } else {
    echo '
    <script language="javascript">
    alert("No existe el usuario");
    window.location.href="../index.html";
    </script>';
  }
/*
  $sql = "SELECT nombre FROM usuarios WHERE matricula='$matricula' AND Contrasena='$hash'";
  $sql2 = "SELECT nombre FROM usuarios WHERE matricula='$matricula' AND Contrasena='$hash' AND Perfil='Profesor'";
  $resultado2=mysql_query($sql2,$conexion) or die ("Error en el sql");
  ///CHECAR UN SQL QUE NOS PERMITA SER PROFESOR
  if (mysql_num_rows($resultado)>0)
  {
    header("location: plantilla_general.php") ;
}if(mysql_num_rows($resultado2)>0){
  header("location: plantilla_administrador.php");
} else {
  echo '
  <script language="javascript">
  alert("No existe el usuario");
  window.location.href="index.php";
  </script>';
}

/*
window.history.back();
  */
?>
