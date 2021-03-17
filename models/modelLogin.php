<?php

    if($petitionAjax){
        require_once "../config/mainModel.php";
    }else{
        // si la eticion ajax es fale aceder a la configuración DB
        require_once "./config/mainModel.php";
    }
    class modelLogin extends mainModel{
        //funcion que recibe los  datos del login para verificrlos con la base de datos
        protected function start_session_model($datos){
            $statu=1;
            //comparcion de los datos recibidos en el login y los datos guardados en la base de datos
            $sql=mainModel::connect()->prepare("SELECT * FROM usuario WHERE correo_electronico=:email AND clave=:pass AND estado_usuario_id_estado_usuario=:condition");
            $sql->bindParam(':email',$data['email']);
            $sql->bindParam(':pass',$data['pass']);
            $sql->bindParam(':condition',$statu);
            $sql->execute();

            return $sql;
        }
    }