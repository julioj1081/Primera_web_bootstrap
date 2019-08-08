    <script src="../../js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="../../sweet-modal/jquery.sweet-modal.min.css" />
    <script src="../../sweet-modal/jquery.sweet-modal.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    /*var mensaje;
    var option = confirm("Estas seguro de eliminar esta tarea");
    */
    $.sweetModal.confirm('Esta seguro de eliminar esta tarea', '¿Confirmar eliminacion?', function() {

      $.sweetModal({
      	content: 'Eliminado con exito.',
      	icon: $.sweetModal.ICON_SUCCESS,
      });
      setTimeout(function () {
        window.location.href = "eliminar_tarea.php";
      }, 1500);
    /*mensaje = "Espera un momento eliminando la tarea";
    alert(mensaje);
    window.location.href = "eliminar_tarea.php";
*/
    }, function() {
    window.history.back();
  });



    /*
    if(option==1){
       $.sweetModal('Thanks for confirming!');
      mensaje = "Espera eliminando la tarea..";
      alert(mensaje);
      window.location.href = "eliminar_tarea.php";
    }else{
      $.sweetModal('You declined. That\'s okay!');
      mensaje = "Has cancelado la eliminacion de tarea";
      alert(mensaje);
      window.history.back();
    }
    */


  })


 </script>
<?php
$id = $_GET['no'];
SESSION_START();
$_SESSION['no'] = $id;
?>
