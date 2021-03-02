<div class="card shadow mb-4 ">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <!--<div class="page-header"><h4></h4></div>-->
                <div class="pull-left form-inline"><br>
                    <div class="btn-group">
                        <button class="btn btn-primary" data-calendar-nav="prev"><i class="fa fa-arrow-left"></i>  </button>
                        <button class="btn" data-calendar-nav="today">Hoy</button>
                        <button class="btn btn-primary" data-calendar-nav="next"><i class="fa fa-arrow-right"></i>  </button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" data-calendar-view="year">Año</button>
                        <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                        <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                        <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                    </div>
                </div>
                <div class="pull-right form-inline"><br>
                    <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Añadir Evento</button>
                </div>
            </div>
            <br><br><br>
            <div class="row">
                <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->
                
            </div>
            <!--ventana modal para el calendario-->
            <div class="modal fade" id="events-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a href="#" data-dismiss="modal" style="float: right;"> <i class="glyphicon glyphicon-remove "></i> </a>
                            <br>
                        </div>
                        <div class="modal-body" style="height: 400px">
                            <p>One fine body&hellip;</p>
                        </div>
                    
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>

        <script src="<?=$base_url?>js/underscore-min.js"></script>
        <script src="<?=$base_url?>js/calendar.js"></script>
        <script type="text/javascript">
            (function($){
                    //creamos la fecha actual
                    var date = new Date();
                    var yyyy = date.getFullYear().toString();
                    var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                    var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                    //establecemos los valores del calendario
                    var options = {

                        // definimos que los agenda se mostraran en ventana modal
                        modal: '#events-modal', 

                            // dentro de un iframe
                            modal_type:'iframe',    

                            //obtenemos los agenda de la base de datos
                            events_source: '<?=$base_url?>obtener_eventos.php', 

                            // mostramos el calendario en el mes
                            view: 'month',             

                            // y dia actual
                            day: yyyy+"-"+mm+"-"+dd,   


                            // definimos el idioma por defecto
                            language: 'es-ES', 

                            //Template de nuestro calendario
                            tmpl_path: '<?=$base_url?>tmpls/', 
                            tmpl_cache: false,


                            // Hora de inicio
                            time_start: '08:00', 

                            // y Hora final de cada dia
                            time_end: '22:00',   

                            // intervalo de tiempo entre las hora, en este caso son 30 minutos
                            time_split: '30',    

                            // Definimos un ancho del 100% a nuestro calendario
                            width: '100%', 

                            onAfterEventsLoad: function(events)
                            {
                                if(!events)
                                {
                                    return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                    $(document.createElement('li'))
                                    .html('<a href="' + val.url + '">' + val.titulo + '</a>')
                                    .appendTo(list);
                                });
                            },
                            onAfterViewLoad: function(view)
                            {
                                $('#page-header').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                            },
                            classes: {
                                months: {
                                    general: 'label'
                                }
                            }
                        };


                    // id del div donde se mostrara el calendario
                    var calendar = $('#calendar').calendar(options); 

                    $('.btn-group button[data-calendar-nav]').each(function()
                    {
                        var $this = $(this);
                        $this.click(function()
                        {
                            calendar.navigate($this.data('calendar-nav'));
                        });
                    });

                    $('.btn-group button[data-calendar-view]').each(function()
                    {
                        var $this = $(this);
                        $this.click(function()
                        {
                            calendar.view($this.data('calendar-view'));
                        });
                    });

                    $('#first_day').change(function()
                    {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                    });
                }(jQuery));
            </script>

            <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Agregar nuevo evento</h4>
                </div>
                <div class="modal-body">
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
        </div>
    </div>
</div>