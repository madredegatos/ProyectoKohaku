<?php
//Procesa agregar adminIstrador
$petitionAjax=true;

require_once "../config/ConfigGeneral.php";

//Condicion para comprobar si se reciben los datos del formulario
if(isset($_POST['dni'])){
    require_once"../controllers/controllerAdmin.php";
    $insAdmin= new controllerAdmin();

    if(isset($_POST['dni'])&& 
        isset($_POST['FirstName'])&&
        isset($_POST['LastName'])&&
        isset($_POST['User'])){
            echo $insAdmin->add_controller_Admin();
    } else {
        echo $insAdmin->add_admin_incomplete_data();
    }
}else{
//poner seguridad a la página
    session_start();
    session_destroy();

    //NO ME SALE EL LOGIN CON LOS ESTILOS?????
    echo'<script> window.location.href="'.SERVERURL.'login" </script>';
} 