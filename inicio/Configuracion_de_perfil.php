<?php
SESSION_START();
$matricula = $_SESSION['matricula'];
$conexion = mysqli_connect("localhost","root","","proyecto_web");
$datos= mysqli_query($conexion,"SELECT * FROM usuarios WHERE matricula = '$matricula'");


#Consulta de sql
//INICIAMOS UNA CONSULTA PARA OBTENER LOD DATOS DEL ALUMNO


while($reg = mysqli_fetch_array($datos)){

    $matricula = $reg[1];
    $Nombre = $reg[2];
    $Apellidos = $reg[3];
    $Correo = $reg[5];

}
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Perfil del usuario</title>

 <script language="JavaScript" src="md5.js">
 </script>

 <script language="javascript">
   function encriptar()
   {
     hash = calcMD5(document.getElementById('contrasena').value);
 	//document.form.hash.value=hash;
 	document.getElementById('hash').value=hash;
     alert("Se ha Modificado el perfil");
 	document.form1.submit();
 	return 0;
   }
 </script>
 <style media="screen">

   h3{
     margin-top: 40px;
     text-align: center;
     color: rgba(6, 11, 0, 0.9);
     font-size: x-large;
   }
   #tabla{
     margin:0 -20px 0 10px;
     margin-top: 10px;
     margin-bottom:0%;
   }
   input{
     /*overflow: visible;
     */width: 220px;

   }
   @media screen and (max-width:460px) {
     input{
       /*overflow: visible;
       */width: 130px;
     }
   }
 </style>
 </head>

 <body>
  <div class="table-responsive-xl">

 <h3>Llene todos los campos</h3>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <div class="form-group">
 <form id="form1" name="form1" method="post" action="modificar_perfil.php" enctype="multipart/form-data">
   <table align="center" class="table-borderless">
     <tr>
         <td>Matricula</td>
         <td><label>
           <input type="text" <?php echo "value='$matricula'" ?> id="Matricula" placeholder="Ingresa tu matricula" readonly/>
         </label></td>
     </tr>
     <tr>
       <td>Nombre</td>
       <td><label>
         <input type="text" <?php echo"value='$Nombre'"?> name="Nombre" id="Nombre" placeholder="Ingresa tu Nombre" readonly/>
       </label></td>
     </tr>
     <tr>
       <td>Apellidos</td>
       <td><label>
         <input type="text" <?php echo "value='$Apellidos'";?> name="Apellidos" id="Apellidos" placeholder="Ingresa tus apellidos" readonly/>
       </label></td>
     </tr>

     <tr>
       <td>Contraseña</td>
       <td><label>
         <input type="password" name="contrasena" id="contrasena" placeholder="Ingresa una nueva contraseña" required/>
       </label></td>
     </tr>
     <tr>
       <td>Correo</td>
       <td><label>
         <input type="text" <?php echo "value='$Correo'";?> name="Correo" id="Correo" placeholder="Ingresa un correo electronico" required/>
       </label></td>
     </tr>

     <tr>
         <td>Sube una nueva foto</td>
         <td><input type="file" name="Foto" placeholder="Ingresa una foto opcional" required></td>
     </tr>

     <tr>
       <td>
         <input type="submit" name="button" id="button" value="Hacer los cambios" onclick="encriptar()" align="center"class="btn btn-info"/>
         <input name="hash" type="hidden" id="hash">
       </td>
       <td><input type="reset" value="Descartar" class="btn btn-danger"></td>
     </tr>
   </table>
 </form>
</div>
</div>
 <p>&nbsp;</p>
 <p>&nbsp;</p>



 </body>
 </html>
