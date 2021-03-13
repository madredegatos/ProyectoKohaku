<div class="container-fluid">
	<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-start mb-4">
            
            <a href="#" class="d-none mr-2 d-sm-inline-block btn btn-sm btn-kohaku shadow-sm">
				<i class="fas fa-download fa-sm text-white-50"></i> Crear Clase
            </a>
			<a href="#" class="d-none mr-2 d-sm-inline-block btn btn-sm btn-kohaku shadow-sm">
				<i class="fas fa-download fa-sm text-white-50"></i> Registar Clase
            </a>
        </div>
		
    <!-- Content Row -->
    <div class="row">
		<!-- Content Row -->
		
		<!-- Area Chart -->
		<div class="col-xl-8 col-lg-7">
			<?php
			  $tipo_usuario_administrador=1;
			  $tipo_usuario_alumno=3;
			  if( $_SESSION['usertype_sk']==$tipo_usuario_alumno){
			      include "views/modules/selecionarClasesAlumno.php";
			     
			  }
			  if( $_SESSION['usertype_sk']==$tipo_usuario_administrador){
			     include "views/modules/agendarClasesAdministrador.php";
			  }
			?>

			
		</div>
	</div>  
</div>
