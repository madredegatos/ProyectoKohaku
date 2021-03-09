<?php

    if($petitionAjax){
        require_once "../config/mainModel.php";
    }else{
        // si la eticion ajax es fale aceder a la configuración DB
        require_once "./config/mainmodel.php";
    }
    class modelLogin extends mainModel{
        //funcion que recibe los  datos del login para verificrlos con la base de datos
        protected function start_model_session($datos){
            // $statu=1;
            //comparcion de los datos recibidos en el login y los datos guardados en la base de datos
            // $sql=mainModel::connect()->prepare("SELECT * FROM usuario WHERE correo_electronico=:email AND clave=:pass AND estado_usuario_id_estado_usuario=:condition");
            // $sql->bindParam(':email',$data['email']);
            // $sql->bindParam(':pass',$data['pass']);
            // $sql->bindParam(':condition',$statu);
            // $sql->execute();

            //***INCLUIR LA TABLA CUENTA Y ADMINISTRADOR EN LA DB DE AHI SE TOMAN LOS VALORES PARA INICIAR SESIÓN
            $sql=mainModel::connect()->prepare("SELECT * FROM cuenta WHERE Correo=:Correo AND Clave=:Clave AND Estado=1");
            $sql->bindParam(':Correo',$datos['Correo']);
            $sql->bindParam(':Clave',$datos['Clave']);
            $sql->execute();
            return $sql;
        }
    }