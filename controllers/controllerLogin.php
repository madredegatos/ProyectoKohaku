<?php

    if($petitionAjax){
        require_once "../models/modelLogin.php";
    }else{
        // si la eticion ajax es fale aceder a la configuración DB
        require_once "./models/modelLogin.php";
    }
    class controllerLogin extends modelLogin{
        public function star_controller_session(){
            $email=mainModel::clean_string($_POST['loginemail']);
            $pass=mainModel::clean_string($_POST['loginpass']);
            
            //$pass=mainModel::encryption($pass);

            $logindata=[
                "email"=>$email,
                "pass"=>$pass
            ];

            $userdata=modelLogin::star_model_session($logindata);
            
            if($userdata->rowcount()==1){
                $userrow=$userdata->fetch();
                session_star(['name'=>'SK']);
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