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
            $sql->bindParam(':email',$datos['email']);
            $sql->bindParam(':pass',$datos['pass']);
            $sql->bindParam(':condition',$statu);
            $sql->execute();
            return $sql->fetch();
        }
        protected function start_session_count_model($datos){
            $statu=1;
            //comparcion de los datos recibidos en el login y los datos guardados en la base de datos
            $sql=mainModel::connect()->prepare("SELECT COUNT(*) total FROM usuario WHERE correo_electronico=:email AND clave=:pass AND estado_usuario_id_estado_usuario=:condition");
            $sql->bindParam(':email',$datos['email']);
            $sql->bindParam(':pass',$datos['pass']);
            $sql->bindParam(':condition',$statu);
            $result=$sql->execute();

            return $result;
        }
    }