<?php


// Definimos nuestra zona horaria
date_default_timezone_set("America/Santiago");

// incluimos el archivo de funciones
include 'util/funciones.php';

// incluimos el archivo de configuracion
include 'config/config.php';

$base_url='vendor/calendario/';


?>



  
    <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
    <link href="<?=$base_url?>css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?=$base_url?>js/es-ES.js"></script>
    <script src="<?=$base_url?>js/jquery.min.js"></script>
    <script src="<?=$base_url?>js/moment.js"></script>
    <script src="<?=$base_url?>js/bootstrap.min.js"></script>
    <script src="<?=$base_url?>js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" href="<?=$base_url?>css/bootstrap-datetimepicker.min.css" />
    

    
     <h1>Mis Clases</h1>
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
        <br/> <h1>Seleccionar clases</h1>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Clase</th>
      <th scope="col">Instructor</th>
      <th scope="col">Fecha Inicio</th>
       <th scope="col">Fecha Fin</th>
       <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   <?php
   $idUsuarioSesion=$_SESSION['userid_sk'];
       $sql="select c.titulo,c.inicio_normal,c.final_normal, u.nombre, c.id from clase c 
             inner join usuario u on u.id_usuario=c.id_instructor 
             where c.id not in(select uc.clases_id_clases from usuario_has_clase uc where uc.usuario_id_usuario=".$idUsuarioSesion.");";
       if ($conexion->query($sql)->num_rows)
       {
        $resultadoConsulta = $conexion->query($sql);
        $i=0;
       while($row=$resultadoConsulta->fetch_array()) 
       {
           $i++;
           echo '<tr>';
           echo '<th scope="row">'.$i.'</th>';
           echo '<td>'.$row['titulo'].'</td>';
           echo '<td>'.$row['nombre'].'</td>';
           echo '<td>'.$row['inicio_normal'].'</td>';
           echo '<td>'.$row['final_normal'].'</td>';
           echo '<td><input type="button" value="selecionar" onclick="guardarClase('.$idUsuarioSesion.', '.$row['id'].')" /></td>';
           echo '</tr>';
        }
        }
       ?>
  </tbody>
</table>
    
       
  

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
                        events_source: 'models/obtener_eventos_alumno.php?id_user='+<?=$_SESSION['userid_sk']?>, 

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


        function guardarClase(idAlumno, isClase){
            $.ajax({
                type: "POST",
                url: "models/guardar_clase_alumno.php",
                data: { id_alumno: idAlumno,id_clase : isClase}
              }).done(function( msg ) {
                 
            	  window.location.replace("?page=class");
              });
        }
        </script>
