<?php

    require_once "./models/viewsModel.php";
    //Se crea la clase con el nombre del archivo por buena práctica
    //para que vista controlador herede de vistas modelo
    class viewsController extends viewsModel{
        //Este contralador obtiene la plantilla y la muestra
        public function get_template_controller(){
           return require_once "./views/template.php";
        }

        //cuando se envie un valor por la url muestre el contenido 
        public function get_views_controller(){
            //con la condicional vamos a idenificar si la variable isset viene deinida
            //viewAcces es la variable del archivo .htaccess
            if(isset($_GET['page'])){
                //se crea una vaiable con la ruta 
                //(explode) permite divir una vaiable en partes con un delimitador
                $route=explode("/", $_GET['page']);
                //self :: hacer referencia a la clase heredada
                //::ignifica acceder al método

                $answer=viewsModel::get_views_model($route[0]);
            }else{
                //si la variable no está definida envía al login
                $answer="login";
            }
            return $answer;
        }
    }