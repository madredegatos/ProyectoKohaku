<?php
    
    if($petitionAjax){
        require_once "../config/mainModel.php";
    }else{
        // si la eticion ajax es fale aceder a la configuración DB
        require_once "./config/mainmodel.php";
    }

    //MODELO PARA CREAR ADMINISTRADOR
    class modelAdmin extends mainModel{
        public function add_modelAdmin($datos){
            $sql=mainModel::connect()->prepare("INSERT INTO administrador(Identificacion,Nombres,Apellidos,Direccion,Telefono,Codigo) VALUES(:Identificacion,:Nombres,:Apellidos,:Direccion,:Telefono,:Codigo)");
            $sql->bindParam(":Identificacion", $datos['Identificacion']);
            $sql->bindParam(":Nombres", $datos['Nombres']);
            $sql->bindParam(":Apellidos", $datos['Apellidos']);
            $sql->bindParam(":Direccion", $datos['Direccion']);
            $sql->bindParam(":Telefono", $datos['Telefono']);
            $sql->bindParam(":Codigo", $datos['Codigo']);
            $sql->execute();
            return $sql;

        }
}