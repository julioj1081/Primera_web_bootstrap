<script src="../../js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="../../sweet-modal/jquery.sweet-modal.min.css" />
<script src="../../sweet-modal/jquery.sweet-modal.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $.sweetModal({
    	content: 'This is a success.',
    	icon: $.sweetModal.ICON_SUCCESS
    });
  });
</script>
<?php
SESSION_START();
$kk = $_SESSION['no'];
echo "la tarea que va a eliminar es $kk";
$conexion = new mysqli("localhost","root","","proyecto_web");
$query = "DELETE FROM actividades_de_aprendizaje  WHERE idActividad = '$kk'";
$resultado = $conexion->query($query);
header('Location: http://localhost/web/inicio/plantilla_administrador.php#/tabla');
?>
