

<?php
		function conexion(){
			$servidor="localhost";
			$usuario="root";
			$password="";
			$bd="proyecto_web";

			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

			return $conexion;
		}

 ?>
