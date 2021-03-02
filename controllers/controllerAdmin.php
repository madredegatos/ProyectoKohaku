<?php
    //CONTROLADOR PARA CREAR ADMINISTRADOR
    if($petitionAjax){
        require_once "../models/modelAdmin.php";
    }else{
        // si la Peticion ajax es false aceder a la configuración DB
        require_once "./models/modelAdmin.php";
    }

//clase heredada de modelo administrador
    class controllerAdmin extends modelAdmin{

        public function add_controller_Admin(){
            $identificacion= mainModel::clean_string($_POST['dni']);
            $nombre= mainModel::clean_string($_POST['FirstName']); 
            $apellido= mainModel::clean_string($_POST['LastName']);
            $direccion= mainModel::clean_string($_POST['Adress']); 
            $telefono= mainModel::clean_string($_POST['Phone']);
            $usuario= mainModel::clean_string($_POST['User']);
            $correo= mainModel::clean_string($_POST['Email']);
            $contrasena1= mainModel::clean_string($_POST['Pass1']);
            $contrasena2= mainModel::clean_string($_POST['Pass2']);
            $genero= mainModel::clean_string($_POST['Genere']);
            $privilegio= mainModel::clean_string($_POST['Privileges']);

            //validación contraseñas
            if($contrasena1!=$contrasena2){
                $alert=[
                    "alert"=>"simple",
                    "title"=>"Ocurrio un error inesperado",
                    "text"=>"Las contraseñas no coinciden",
                    "type"=>"error"
                ];
            }else{
                //validación documento registrado
                $consult1=mainModel::run_simple_query("SELECT Identificacion
                 FROM administrador WHERE Identificacion ='$identificacion'");

                if($consult1->rowCount()>=1){
                    $alert=[
                        "alert"=>"simple",
                        "title"=>"Ocurrio un error inesperado",
                        "text"=>"El número de Identificación ya está registrado",
                        "type"=>"error"
                    ];
                }else{
                    //validación correo
                    if($correo!=""){
                        $consult2=mainModel::run_simple_query("SELECT Correo
                        FROM cuenta WHERE Correo = '$correo'");  
                        //variable correo-cuenta- columnas afectadas
                        $cc=$consult2->rowCount();
                    }else{
                        //si no existe es 0
                        $cc=0;
                    }
                    if($cc>=1){
                        $alert=[
                            "alert"=>"simple",
                            "title"=>"Ocurrio un error inesperado",
                            "text"=>"El correo ingresado está registrado",
                            "type"=>"error"
                        ];
                    }else{
                        //validación de usuario
                        $consult3=mainModel::run_simple_query("SELECT Usuario
                        FROM cuenta WHERE Usuario = '$usuario'");

                        if($consult3->rowCount()>=1){
                            $alert=[
                                "alert"=>"simple",
                                "title"=>"Ocurrio un error inesperado",
                                "text"=>"El usuario ingresado está registrado",
                                "type"=>"error"
                            ];
                        }else{
                            //validación cuantos registros tengo
                            $consult4=mainModel::run_simple_query("SELECT id
                            FROM cuenta");
                              //variable para guardar la consulta
                            $num=($consult4->rowCount())+1;
                             // generar código aletaorio de 10 cifras AC: Account
                            $codigo=mainModel::generate_random_code("AC", 10, $num);

                            // encriptar la contraseña
                            $clave=mainModel::encryption($contrasena1);

                            // Crar un array para ingresar una cuenta
                            $dataAC=[
                                "Codigo"=>$codigo,
                                "Privilegio"=>$privilegio,
                                "Usuario"=>$usuario,
                                "Clave"=>$clave,
                                "Correo"=>$correo,
                                "Estado"=>"Activo",
                                "Tipo"=>"Administrador",
                                "Genero"=>$genero,
                            ];
                            $saveAccount=mainModel::add_account($dataAC);
                            // Comprobar si se registro la cuenta

                            if($saveAccount->rowCount()>=1){
                                $dataAD=[
                                    "Identificacion"=>$identificacion,
                                    "Nombres"=>$nombre,
                                    "Apellidos"=>$apellido,
                                    "Direccion"=>$direccion, 
                                    "Telefono"=>$telefono,
                                    "Codigo"=>$codigo,
                                ];
                                $saveAdmin=modelAdmin::add_modelAdmin($dataAD);
                                if($saveAdmin->rowCount()>=1){
                                    $alert=[
                                        "alert"=>"limpiar",
                                        "title"=>"Administrador registrado",
                                        "text"=>"El administrador se creo con Éxito",
                                        "type"=>"success"
                                    ];
                                }else{
                                    mainModel::delete_account($codigo);
                                    $alert=[
                                        "alert"=>"simple",
                                        "title"=>"Ocurrio un error inesperado",
                                        "text"=>"No se pudo registrar el administrador",
                                        "type"=>"error"
                                    ];
                                }

                                }else{
                                $alert=[
                                    "alert"=>"simple",
                                    "title"=>"Ocurrio un error inesperado",
                                    "text"=>"La cuenta no se pudo registrar",
                                    "type"=>"error"
                                ];
                            }
                        }
                    }
                }
            }
            
            return mainModel::sweet_alert($alert);
        }
    
        public function add_admin_incomplete_data() {
            $alert=[
                "alert"=>"simple",
                "title"=>"Información incompleta",
                "text"=>"Diligencie todos los campos",
                "type"=>"error"
            ];

            return mainModel::sweet_alert($alert);
        }

    
    }