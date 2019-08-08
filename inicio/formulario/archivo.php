<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Entrega de calificacion</title>
        <style media="screen">
        body{
          margin-top: 0px;
          padding: 0;
          background-image:url('../../img/fondo.png'); 
        }
          iframe{
            padding: 0;
            margin: 0;
          }
          #ventana{
            display: flex;
            width:70%;
            height:620px;
          }
          .limpiar{
            clear: both;
            float: none;
          }
          form{
            color:white;
            background-color: #565F51;
            margin-top: -590px;
            width: 28%;
            float: right;
          }
          h5{
            text-align:left;
            padding:20px;
            
          }
          input[type="text"], input[type="submit"]{
            text-align: center;
            display:block;
            margin:0 auto;
            width:65%;
          }
          @media screen and (max-width:900px){
            #ventana{
            width: 100%;
            display: block;
            }
            .limpiar{
              clear: both;
              float: none;
              display: flex;
            }
            form{
              clear: both;
              display: block;
              width: 80%;
              border: 1px solid black;
              margin-top:28px;
              text-align: center;
              margin-right: 10%;
            }
          }
          @media screen and (max-width:640px) {
            #ventana{
              display:block;
              width: 100%;
              display: block;
              padding:15px;
            }
            form{
              clear: both;
              display: block;
              width: 80%;
              border: 1px solid black;
              margin-top:28px;
              text-align: center;
              margin-right: 10%;
            }

          }
        </style>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" />

      
    </head>
    <body>
        <?php
        $conexion = mysqli_connect("localhost","root","","proyecto_web");
        $sql= mysqli_query($conexion,"SELECT * FROM tareas where idTareas=".$_GET['idTareas']);
            if($datos = mysqli_fetch_array($sql)){
                if($datos['nombre_archivo']==""){?>
        <p>NO tiene archivos que se relacionen</p>
                <?php }else{ ?>
        <iframe src="../archivos/<?php echo $datos['nombre_archivo']; ?>" id="ventana">
        </iframe>
                <?php } } ?>
<div class="limpiar"></div>
                <div>
                  <form action="subir_calificacion.php" method="post">
                        <h5 class="font-weight-light">Matricula del alumno</h5>
                        <input class="form-control" type="text" name="matricula" value="<?php echo $datos[6];?>" readonly>
                        <h5 class="font-weight-light">Nombre del alumno</h5>
                        <input class="form-control" type="text" name="nombre" value="<?php echo $datos[7];?>" readonly>
                        <h5 class="font-weight-light">Entregado el dia</h5>
                        <input class="form-control" type="text" name="nombre" value="<?php echo $datos[8];?>" readonly>
                        <h5 class="font-weight-light">Calificacion por el trabajo</h5>
                        <input class="form-control" type="text" name="calificacion" id="calificacion" placeholder="ejemplo 1,2,3 puntos" required>
                        <br>
                        <br>
                        <input class="btn btn-info" type="submit" name="modif" value="Entregar calificacion">
                        <br><br>
                  </form>
                </div>
    </body>
</html>
