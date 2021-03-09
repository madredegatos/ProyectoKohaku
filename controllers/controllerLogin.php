<?php

    if($petitionAjax){
        require_once "../models/modelLogin.php";
    }else{
        // si la eticion ajax es fale aceder a la configuración DB
        require_once "./models/modelLogin.php";
    }
    class controllerLogin extends modelLogin{
        // cuncion para iniciar sesion
        public function star_controller_session(){
            //se limpian los espacios que se piden en login por si traian partes de cadena anterior 
            //y luego se usa la nueva cadena en las variables
            $email=mainModel::clean_string($_POST['loginemail']);
            $pass=mainModel::clean_string($_POST['loginpass']);
            //se encripta la contraseña
            $pass=mainModel::encryption($pass);
            //se pasan los datos del login a una variable para usarlos en el modelo
            $logindata=[
                "email"=>$email,
                "pass"=>$pass
            ];
            //se pasan los datos del login al modelo
            $userdata=modelLogin::star_model_session($logindata);
            
            if($userdata->rowCount()==1){
                $userrow=$userdata->fetch();

                @session_start(['name'=>'SK']);
                $_SESSION['firstname_sk']=$userrow['nombre'];
                $_SESSION['lasttname_sk']=$userrow['apellido'];
                $_SESSION['email_sk']=$userrow['correo_electronico'];
                $_SESSION['usertype_sk']=$userrow['tipo_usuario_id_tipo_usuario'];
                $_SESSION['token_sk']=md5(uniqid(mt_rand(),true));
                $_SESSION['userid_sk']=$userrow['id_usuario'];
            }
            else{
                $alert=[
                    "alert"=>"simple",
                    "title"=>"ocurrió un error inesperado",
                    "text"=>"El nombre de usuario y contrseña no son correcto o su cuenta puede estar deshabilitada",
                    "type"=>"error"
                ];
                return mainModel::sweet_alert($alert);
            }
        }
        
    }
?>