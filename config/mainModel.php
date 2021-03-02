<?php

    if($petitionAjax){
        require_once "../config/configApp.php";
    }else{
        // si la peticion ajax es false aceder a la configuración DB
        require_once "./config/configApp.php";
    }
    //modelo principal
    class mainModel{
    //nos permite idenficar las peticiones 
    protected function connect(){
        $link = new PDO(SGBD,USER,PASS);
        return $link;
    }
    //ejecutar consula simple
    protected function run_simple_query($query){
        //recibe la consulta
        $answer=self::connect()->prepare($query);
        $answer->execute();
        return $answer;
    }
    //crear cuenta
    protected function add_account ($datos){
        $sql=self::connect()->prepare("INSERT INTO cuenta(Codigo,Privilegio,Usuario,Clave,Correo,Estado,Tipo,Genero)
         VALUES (:Codigo,:Privilegio,:Usuario,:Clave,:Correo,:Estado,:Tipo,:Genero)");
        $sql->bindParam(":Codigo",$datos['Codigo']);
        $sql->bindParam(":Privilegio",$datos['Privilegio']);
        $sql->bindParam(":Usuario",$datos['Usuario']);
        $sql->bindParam(":Clave",$datos['Clave']);
        $sql->bindParam(":Correo",$datos['Correo']);
        $sql->bindParam(":Estado",$datos['Estado']);
        $sql->bindParam(":Tipo",$datos['Tipo']);
        $sql->bindParam(":Genero",$datos['Genero']);
        $sql->execute();
        return $sql;
    }

    //eliminar cuenta
    protected function delete_account ($codigo){
        $sql=self::connect()->prepare("DELETE FROM cuenta WHERE codigo=:Codigo");
        $sql->bindParam(":codigo",$codigo);
        $sql->execute();
        return $sql;
    }

    //encriptar strings
    public function encryption($string){
        $output=FALSE;
        $key=hash('sha256',SECRET_KEY);
        $iv=substr(hash('sha256',SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }
    //desencriptar strings
    public function decryption($string){
        $key=hash('sha256',SECRET_KEY);
        $iv=substr(hash('sha256',SECRET_IV), 0, 16);
        $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }
    //generar codigo aleatorío
    protected function generate_random_code($letra, $longitud, $num){
        for($i=1; $i<=$longitud; $i++){
            $numero = rand(0,9);
            $letra.=$numero;
        }
        return $letra.$num;
    }
     //Limpiar cadenas de texto
    protected function clean_string ($string){
        //trim elimina espacios en blanco
        $string=trim($string);
        //strip quita las baras de un string con comillas
        $string=stripslashes($string);
        //sobreescribir un string
        $string=str_ireplace("<script>", "", $string);
        $string=str_ireplace("</script>", "", $string);
        $string=str_ireplace("<script src", "", $string);
        $string=str_ireplace("<script type=", "", $string);
        $string=str_ireplace("SELECT * FROM", "", $string);
        $string=str_ireplace("DELETE FROM", "", $string);
        $string=str_ireplace("INSERT INT", "", $string);
        $string=str_ireplace("--", "", $string);
        $string=str_ireplace("^", "", $string);
        $string=str_ireplace("[", "", $string);
        $string=str_ireplace("]", "", $string);
        $string=str_ireplace("==", "",$string);
        return $string;
    }

    //función para mostrar alertas
    protected function sweet_alert($datos){
        if ($datos['alert']=="simple"){
            $alert="
            <script>
               swal( 
                '".$datos['title']."',
                '".$datos['text']."',
                '".$datos['type']."',
                 ); 
            </script>
            ";
        }elseif($datos['alert']=="recargar"){
            $alert="
            <script>
                swal({ 
                    title: '".$datos['title']."',
                    text: '".$datos['text']."',
                    type: '".$datos['type']."',
                    confirmButtonText: 'Aceptar'
                }).then(function(){
                    $('.FormularioAjax')[0].reset();
                }); 
            </script>
            ";
        }elseif($datos['alert']=="limpiar"){
            $alert="
            <script>
                swal({ 
                    title: '".$datos['title']."',
                    text: '".$datos['text']."',
                    type: '".$datos['type']."',
                    confirmButtonText: 'Aceptar'
                }).then(function(){
                    $('.FormularioAjax')[0].reset();
                }); 
            </script>
            ";
        }
        return $alert;
    }   
}   