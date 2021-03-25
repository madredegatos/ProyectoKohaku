<?php

    if($petitionAjax){
        require_once "../models/modelLogin.php";
    }else{
        // si la eticion ajax es fale aceder a la configuración DB
        require_once "./models/modelLogin.php";
    }
    class controllerLogin extends modelLogin{
        // Funcion para iniciar sesion

        public function start_session_controller(){
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
            $userdata=modelLogin::start_session_model($logindata);
            $userdatarequest=modelLogin::start_session_count_model($logindata);
            
            if($userdatarequest['total']=="1"){
            //if($userdata->rowCount()>0){
			    
                
                $_SESSION['firstname_sk']=$userdata['nombre'];
                $_SESSION['lastname_sk']=$userdata['apellido'];
                $_SESSION['email_sk']=$userdata['correo_electronico'];
                $_SESSION['usertype_sk']=$userdata['tipo_usuario_id_tipo_usuario'];
                $_SESSION['userid_sk']=$userdata['id_usuario'];

                //Se agrega este código para acceder a la vista del calendario
                $url=SERVER_RELATIVE_URL."userupdate";
                
               
                return $url;

               /* $alert=[
                    "alert"=>"simple",
                    "title"=>"ocurrió un error inesperado",
                    //"text"=>"El nombre de usuario y contrseña no son correcto o su cuenta puede estar deshabilitada",
                    "text"=>$userdatarequest['total']."<br>".$_SESSION['userid_sk']."<br>".$_SESSION['firstname_sk']."<br>".$_SESSION['lastname_sk'],
                    "type"=>"error"
                ];
                return mainModel::sweet_alert($alert);
*/
            } else{
                $alert=[
                    "alert"=>"simple",
                    "title"=>"ocurrió un error inesperado",
                    "text"=>"El nombre de usuario y contrseña no son correcto o su cuenta puede estar deshabilitada",
                    //"text"=>$userdatarequest['total']."<br>".$_SESSION['userid_sk'],
                    "type"=>"error"
                ];
                return mainModel::sweet_alert($alert);
            }
        }
        
        public function close_session_controller(){
			@session_name('SK');
            @session_start();
            if (isset($_SESSION['userid_sk'])){
                unset($_SESSION['firstname_sk']);
                unset($_SESSION['lasttname_sk']);
                unset($_SESSION['email_sk']);
                unset($_SESSION['usertype_sk']);
                unset($_SESSION['userid_sk']);
                @session_destroy();
            }
            /*else{
                $alert=[
                    "alert"=>"simple",
                    "title"=>"ocurrió un error inesperado",
                    "text"=>$_SESSION['userid_sk'],
                    "type"=>"error"
                ];
                return mainModel::sweet_alert($alert);
            }*/
        }
        
    }
