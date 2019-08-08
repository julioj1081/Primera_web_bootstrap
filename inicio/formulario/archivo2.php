<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Comentario de tareas</title>

        <style media="screen">

         #ventana{
            display:flex;
            width:70%;
            height:800px;
         }

          .chat{
            display:block;
            float:right;
            width:28%;
            margin-top:-790px;
          }
          @media screen and (max-width: 980px) {
            
            #ventana{
                width:100%;
                height:800px;
            }
            .limpiar{
              clear:both;
              float:none;
            }
            .chat{
              display:block;
              width:100%;
              margin-top:20px;
            }
          }


        </style>
        <script src="../../js/jquery-1.10.2.min.js"></script>

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


<!--AQUI LA TABLA DONDE PUEDES INCLUI COMENTARIOS
                    <div id="container">
                      <div id="resultado">
                      </div>
                    </div>

 -->
 <div id="fb-root"></div>
                  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.3"></script>
                  </div>

<div class="chat">                
                  <h6>Comenta o da una opinion</h6>
                  <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="500px" data-numposts="2"></div>
</div>
                  
    </body>
</html>
        <script language="JavaScript" type="text/javascript">
        /*
          alert("este texto es el que modificas");
          $(document).ready(function(){
            function obtener_Datos(){
              $.ajax({
              url: "./mostrar_datos.php",
              method: "post",
              success: function(data){
                $("#resultado").html(data)
              }
            })
            }
            obtener_Datos();

            //AGregando datos aser un session en matricula o idYateay pasar todos los datos
            /**
            $(document).on("click","#add",function(){
              var nombre_add = $("#nombre_add").text();
              var comentario_add = $("#comentario_add").text();
              $.ajax({
                url:"./insertar_datos.php",
                method: "post",
                success: function(data){
                  obtener_Datos();
                  alert(data);
                }
              })
            })
             

            ACTUALIZANDO DATOS falta
            $(document).on("blur","#nombre",function(){
              var nombre = $(this).data("id_usuario");
              var comentario = $(this).text();
              actualizar_datos(nombre,comentario,"nombre_users");
            })
          })
          */
        </script>
<!--
    <form action="subir_calificacion.php" method="post">
                  <h4>comenta y da tu opinion hacerca de este trabajo</h4>
                        <h5 class="font-weight-light">Matricula del alumno</h5>
                        <input class="form-control" type="text" name="matricula" value="<?php //echo $datos[6];?>" readonly>
                        <h5 class="font-weight-light">Nombre del alumno</h5>
                        <input class="form-control" type="text" name="nombre" value="<?php // echo $datos[7];?>" readonly>
                        <h5 class="font-weight-light">Entregado el dia</h5>
                        <input class="form-control" type="text" name="nombre" value="<?php // echo $datos[8];?>" readonly>
                        <h5 class="font-weight-light">Calificacion por el trabajo</h5>
                        <input class="form-control" type="text" name="calificacion" id="calificacion" placeholder="ejemplo 1,2,3 puntos" required>
                        <br>
                        <br>
                        <input class="btn btn-info" type="submit" name="modif" value="Entregar calificacion">
                        <br><br>
                  </form>
                  <div>
                  <div id="fb-root"></div>
                  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.3"></script>
                  </div>

  -PARTE DE FACEBOOK
                  <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="40%" data-numposts="2"></div>

-->
