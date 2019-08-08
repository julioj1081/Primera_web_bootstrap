<!DOCTYPE html>
<html>
<head>
  <!--
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
--><title>Tabla dinamica</title>
  <style media="screen">
    body{
      margin-top: 40px;
      max-width: auto;
    }
    #boton{
      display: flex;
      padding: 5px;
      margin-top: 16px;
      margin-bottom: 16px;
    }
  </style>
</head>
<body>
  <div class="container">
		<div id="tabla"></div>
    <input type="button" id="boton" class="btn btn-primary" onclick="JavaScript:Nueva_tarea();" value="Subir una nueva tarea">
	</div>


<!-- Edicion de datos -->


</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('componentes/tareas.php');
	});
</script>
<script>
function Nueva_tarea(){
    location.href="http://localhost/web/inicio/plantilla_administrador.php#/Nueva_tarea";
}
</script>
