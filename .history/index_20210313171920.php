<?php

    require_once "./config/ConfigGeneral.php";
  
    //se inlcuye el controlador vista controlador
    require_once "./controllers/viewsController.php";
    hola¿
    //Se instancia la clase vista controlador en una variable
    $template = new viewsController();
    //llamamos la función de la clase vistas contolador
    $template->get_template_controller();



