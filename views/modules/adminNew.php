<!-- Card Content -->
<div class="card shadow mb-4 ">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <div class="form-group row mb-0">    
            <h1 class="h4 mb-0 text-white-800 text-center text-dark">Formulario Registro Nuevo Administrador</h1>
        </div>
    </div>

    <!-- Card Body -->
    <div class="card-body py-3 d-flex flex-row align-items-center justify-content-center">
        <div class="row">
            <!-- RUTA PARA ENVIAR LOS DATOS AJAX -->
            <form action="<?php echo SERVERURL; ?>ajax/adminAjax.php"
                method="POST" data-form="save" class="FormularioAjax" autocomplete="off"
                enctype="multipart/form-data">

                <div class="text-danger h5">Datos Personales</div>

                <div class="form-group row">
                    
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control" id="tipoDni" name="tipoDni" >
                            <option>Identificación</option>
                            <option>Tarjeta Identidad</option>
                            <option>Cédula</option>
                            <option>Pasaporte</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="dni"
                        name="dni" placeholder="Número de documento" required="" pattern="[0-9-]{1,30}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="FirstName"
                        name="FirstName" required="" placeholder="Nombres" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="LastName"
                        name="LastName" placeholder="Apellidos" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="Adress" required=""
                         id="Adress"
                        placeholder="Dirección">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="phone" class="form-control form-control-user" id="Phone"
                        name="Phone" required="" placeholder="Telefono" pattern="[0-9+]{1,15}">
                    </div>
                </div>
                
                <div class="text-danger h5">Datos de la cuenta</div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="User"
                        name="User" required placeholder="Usuario" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="email" class="form-control form-control-user" id="Email"
                        name="Email" required="" placeholder="Correo">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user"
                        name="Pass1" required="" id="Pass1" placeholder="Contraseña">
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user"
                        name="Pass2" required="" id="Pass2" placeholder="Repita la contraseña">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="radio" class="" name="Genere" id="Genere" value="Masculino" checked="">
                         <i ></i> &nbsp; Masculino
                    </div> 

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="radio" class=" " name="Genere" id="Genere" value="Femenino" checked="">
                         <i ></i> &nbsp; Femenino
                    </div>

                </div>

                <div class="text-danger h5">Nivel de privilegios</div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" id="Privileges1" name="Privileges" value="1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Nivel 1:  Control total del sistema
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" id="Privileges2" name="Privileges" value="2" checked>
                    <label class="form-check-label" for="exampleRadios2">
                        Nivel 2:  Permiso para registro y actualización
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" id="Privileges3" name="Privileges" value="3" checked>
                    <label class="form-check-label" for="exampleRadios3">
                        Nivel 3:  Permiso para registro
                    </label>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mt-3 mb-sm-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-kohaku">Enviar</button>
                    </div>
                </div>

                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>    
</div>
