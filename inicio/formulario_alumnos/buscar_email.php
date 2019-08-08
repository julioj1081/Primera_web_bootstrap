<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/*DESCARGAMOS LA LIBRERIA DE PHPMAILER Y LA PEGAMOS EN LA RUTA SIGUIENTE CON UNA CARPETA
LLAMADA PhpMailer*/
require 'PhpMailer/Exception.php';
require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';

/* BUSCAR DATOS*/
$Matricula = $_POST['Matricula'];
$Email = $_POST['Email'];
$conexion = mysqli_connect("localhost","root","","proyecto_web");
$resultado= mysqli_query($conexion,"SELECT * FROM usuarios WHERE matricula = '$Matricula' AND Correo = '$Email'");
if (mysqli_num_rows($resultado)>0){
  //Si encuentra el correo has esto
  $conexion = new mysqli("localhost","root","","proyecto_web");
  $query = "SELECT * FROM usuarios WHERE matricula = '$Matricula' AND Correo = '$Email'";
  $datos = $conexion->query($query);

  while($reg = mysqli_fetch_array($datos)){
      $nombre = $reg[2];
      $apellidos = $reg[3];
      $Contrasena = $reg[4];
      $Correo = $reg[5];
    }



    /***********************************/
    /* ENVIO DE CONTRASEÑA*/
    // Instantiation and passing `true` enables exceptions

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.live.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'julioj1081@hotmail.com';      // SMTP username acceso para entra a la cuenta
        $mail->Password   = 'QETUOwryip1081';                // SMTP password acceso para entra a la cuenta
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('julioj1081@hotmail.com', 'Mailer administrador de website'); //Desde donde se va a enviar
        $mail->addAddress($Correo);     // Aquien se le va a enviar


        // Content
        $mail->isHTML(true);                                  // Contenido del mail
        $mail->Subject = 'Restablecimiento de password !!';
          $mail->Body  = 'Hola '.$nombre.' '.$apellidos.'<br><br><br>'
          .'Este es tu password encriptado
          no olvides cambiar tu password al entrar nuevamente a nuestra plataforma
          <a href="http://localhost/web/index.html"><h4>Start Bootstrap</h4></a><br>'
            .'<strong><a>'.$Contrasena.'</a></strong>'.
        "<br> <br> <br>por favor copie y pege la cadena subrayada y dirijase
         al siguiente link una ves entrando a la pagina pege y presione
        el boton de descriptar y obtendra su anterior password.
        <a href='https://md5online.es/'>https://md5online.es/</a>";
        $mail->send();
        echo '
        <script language="javascript">
        alert("Se le a enviado la contraseña");
        window.location.href="https://outlook.live.com/owa/";
        </script>';
    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
}else{
  echo '
  <script language="javascript">
  alert("Correo o matricula erronea intente nuevamente");
  window.location.href="http://localhost/web/#/contrasena";
  </script>';
}
 ?>
