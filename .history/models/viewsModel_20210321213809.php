<?php
//nos permite selccionar las vistas INFORMACIÓN  CRITICA
//Se crea la clase con el nombre del archivo por buena práctica
class viewsModel{
    //se crea una función protegida 
    protected function get_views_model($views){
        //crear una lista de palabra permitidas ejm el nombre de los componentes
        //OJO AQUI...VERIFICAR LISTAS
        $whitelist=["class","privileges","admin","account","adminList","adminSearch","userupdate-view"];
        $noTemplateViews = ["forgot-password", "register"];

        if(in_array($views, $noTemplateViews)) {
            $content=$views;
        }
        //si el valor de la url esta en la lista
        elseif(in_array($views, $whitelist)){
            //mediante una condicion doble se valida
            //sie el arhivo coincide con el de la lista es válido
            if(is_file("./views/pages/".$views."-view.php")){
                //la ariable contenido tiene un valor
                $content="./views/pages/".$views."-view.php";
            }else{
                //si no existe
                $content="login";
            }
        //si vistas es igual al login
        }elseif($views == "login"){
            $content="login";
        //si vistas es igual a index
        }elseif($views =="index"){
            $content="login";
        //de lo contario  sino hay nada definido por defecto muestre el logn
        }else {
            $content="login";
        }
        return $content;
    }
}