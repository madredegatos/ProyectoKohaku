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
            
            
            //+++Se modifica está linea ya que existia el campo en otra tabla
            $email=mainModel::clean_string($_POST['loginemail']);
            $pass=mainModel::clean_string($_POST['loginpass']);

            //$correo=mainModel::clean_string($_POST['correo']);
            //$clave=mainModel::clean_string($_POST['clave']);
            
            //se encripta la contraseña
            $pass=mainModel::encryption($pass);
            //$clave=mainModel::encryption($clave);
            //se pasan los datos del login a una variable para usarlos en el modelo
            $logindata=[
                "email"=>$email,
                "pass"=>$pass
                //"Correo"=>$correo,
                //"Clave"=>$clave,
            ];
            //se pasan los datos del login al modelo
            $userdata=modelLogin::start_session_model($logindata);
            
            if($userdata->rowCount()==1){
                $userrow=$userdata->fetch();
                //SK= SESSION KEY (se trat de los datos de usuario)
                @session_start(['name'=>'SK']);
                /*$_SESSION['usuario_sk']=$userrow['Usuario'];
                $_SESSION['correo_sk']=$userrow['Correo'];
                $_SESSION['tipo_sk']=$userrow['Tipo'];
                $_SESSION['privilegio_sk']=$userrow['Privilegio'];
                $_SESSION['token_sk']=md5(uniqid(mt_rand(),true));
                $_SESSION['codigo_sk']=$userrow['Codigo'];*/
                $_SESSION['firstname_sk']=$userrow['nombre'];
                $_SESSION['lasttname_sk']=$userrow['apellido'];
                $_SESSION['email_sk']=$userrow['correo_electronico'];
                $_SESSION['usertype_sk']=$userrow['tipo_usuario_id_tipo_usuario'];
                $_SESSION['userid_sk']=$userrow['id_usuario'];

                //Se agrega este código para acceder a las vistasdependiendo el tipo de usuario
                if($userrow['tipo_usuario_id_tipo_usuario']==1){
                    $url=SERVERURL."admin";
                }else{
                    $url=SERVERURL."class";
                }
                
                return '<script>window.location=" '.$url.'"</script>';//redireccionar el usuario
            } else{
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