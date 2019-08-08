<?php
  $hash=$_POST["hash"];
  $matricula = $_POST['Matricula'];
  $nombre = $_POST['Nombre'];
  $apellidos = $_POST['Apellidos'];
  $correo = $_POST['Correo'];
  $perfil = "Alumno";

  if(($_POST['Matricula'] == "") || ($_POST['hash'] == "") || ($_POST['Nombre'] == "") ||
  ($_POST['Apellidos'] == "")||($_POST['Correo'] == "") || ($_FILES["Foto"]["tmp_name"] == "")){
    echo '
     <script language="javascript">
      alert("Error: llene todos los campos para poder registrarse");
      window.history.back();
     </script>';
  }else{
   $imagen = addslashes(file_get_contents($_FILES["Foto"]["tmp_name"]));
   $conexion = new mysqli("localhost","root","","proyecto_web");

   $query = "INSERT INTO usuarios(matricula,Nombre,Apellidos,Contrasena,Correo,Perfil,Foto)
   VALUES('$matricula','$nombre','$apellidos','$hash','$correo','$perfil','$imagen')";
   $resultado = $conexion->query($query);

   //PONEMOS CON POR LA CLASE CONEXION.PHP


   if ($resultado) {
     #si lo hace regresa al index
     echo '<script language="javascript">
      alert("Registro exitoso");
     window.location.href="../index.html";
     </script>';
   }
   else{
     echo '
     <script language="javascript">
       alert("Error: imagen de perfil demasiado pesada");
       alert("Seleccione otra imagen de perfil");
     window.location.href="../index.html";
     </script>';
   }

  }

?>
