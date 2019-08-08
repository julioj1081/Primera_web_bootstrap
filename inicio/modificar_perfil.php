<?php
  SESSION_START();
  $matricula = $_SESSION['matricula'];
  $hash=$_POST["hash"];
  $nombre = $_POST['Nombre'];
  $apellidos = $_POST['Apellidos'];
  $correo = $_POST['Correo'];
  $perfil = "Alumno";


    $imagen = addslashes(file_get_contents($_FILES["Foto"]["tmp_name"]));
    $conexion = new mysqli("localhost","root","","proyecto_web");
    $query = "UPDATE usuarios SET Nombre='$nombre', Apellidos = '$apellidos', Contrasena = '$hash', Correo = '$correo' ,Foto ='$imagen' WHERE matricula = '$matricula'";
    $resultado = $conexion->query($query);

    if ($resultado) {
      #si lo hace regresa al index
      header("Location:../index.html");
    }else{
      echo "tu matricula es $matricula";
      echo "tu nombre es $nombre";
      echo "alert('Ocurrio un error');";
    }
  

?>
