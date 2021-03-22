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
			 <form action="" method="post">
                    <label for="from">Inicio</label>
                    <div class='input-group date' id='from'>
                        <input type='text' id="from" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="to">Final</label>
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" id="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="tipo">Seleccione Instructor</label>
                    <select class="form-control" name="id_instructor" id="tipo">
              
                    <?php
                    $sql="select * from usuario where tipo_usuario_id_tipo_usuario=2";
                    if ($conexion->query($sql)->num_rows)
                    {
                        $resultadoConsulta = $conexion->query($sql);
                        while($row=$resultadoConsulta->fetch_array()) 
                        {
                            echo '<option value="'. $row['id_usuario'].'">'. $row['nombre'].'</option>';
                        }
                    }
                    ?>
                    </select>
                    <br>
                    <label for="title">Título</label>
                    <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">

                    <br>


                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion" name="descripcion" required class="form-control" rows="3"></textarea>
                
                    <script type="text/javascript">
                        $(function () {
                            $('#from').datetimepicker({
                                language: 'es',
                                minDate: new Date()
                            });
                            $('#to').datetimepicker({
                                language: 'es',
                                minDate: new Date()
                            });

                        });
                    </script>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
              </form>

			
		</div>
	</div>  
</div>
