<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo COMPANY; ?></title>
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="./views/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/sweet-alert/sweetalert2.css">
    <!-- <link href="./views/css/kohaku.css" rel="stylesheet"> -->
     <!-- Se modifica el link con la variable SERVERURL"> -->
    <link href="<?php echo SERVERURL; ?>views/css/kohaku.css" rel="stylesheet">
    <link href="<?php echo SERVERURL; ?>views/css/calendar.css" rel="stylesheet">
    <?php include "views/modules/script.php"; ?>
</head>

<body id="page-top">
    <?php
        //peticion ajax
        $petitionAjax=false;
        
        //se incluye el archivo vista controlador
        require_once "./controllers/viewsController.php";

        $noTemplateViews = ["forgot-password", "register"];

        //se instancia la vista controlado vistas o vt
        $vt = new viewsController();
        //queremos utilizar la funcion  obtener vista controlador
        //se crea una NUEVA variala $vtA para poder hacer el iclud de la variabl en el conenido SN ERROR
        $vtA=$vt->get_views_controller();
        // si vt trae el valor del login se muestra el login

        if(in_array($vtA, $noTemplateViews)):
            // if($vtA=="login" ||  $vtA=="404"):
            require_once "./views/pages/".$vtA.".php";
        elseif($vtA=="login"):
            require_once "./views/pages/login.php";
            //si no, me incluye todo el contenida de la página
        else:
            //iniciar seión
            require_once "./controllers/controllerLogin.php";
		    $login = new controllerLogin();
            @session_start(['name'=>'sk']); 
            var_dump($_SESSION);
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar: MENU LATERAL -->
        <?php include "views/modules/sidebar.php";?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- topbar: BUSCADOR-->
                <?php include "views/modules/topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- ICNCLUYE EL CONTENIDO DE LA VARIABLE VT-->
                    <?php require_once $vtA; ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kohaku 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include "views/modules/logout.php";?>

  <!--cierra la etiqueta del if-->          
    <?php endif; ?>
</body>

<!-- Bootstrap core JavaScript-->
