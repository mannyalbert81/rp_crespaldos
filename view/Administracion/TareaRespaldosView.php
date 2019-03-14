    
    <!DOCTYPE HTML>
	<html lang="es">
    <head>
    <style>

    

</style>
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Capremci</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
    <?php include("view/modulos/links_css.php"); ?>
       
	</head>
    
    <body class="hold-transition skin-blue fixed sidebar-mini">
    
     <?php
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
     ?>
    
    
    <div class="wrapper">

      <header class="main-header">
      
          <?php include("view/modulos/logo.php"); ?>
          <?php include("view/modulos/head.php"); ?>	
        
      </header>
    <!-- 
       <aside class="main-sidebar">
        <section class="sidebar">
         <?php include("view/modulos/menu_profile.php"); ?>
          <br>
         <?php include("view/modulos/menu.php"); ?>
        </section>
      </aside>
 -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        
        <small><?php echo $fecha; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Respaldo</li>
      </ol>
    </section>



    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tareas de Respaldo</h3>
          <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            
          </div>
        </div>

        <div class="box-body">
        <div id="Editar_div" style ="display:none">
        <div class="col-xs-12 col-md-3 col-lg-3">
        <label for="id_tarea_respaldos" class="control-label">ID Tarea:</label>
        <select name="id_tarea" id="id_tarea"  class="form-control" >
                                      <option value="" selected="selected">--Seleccione--</option>
    									<?php  foreach($resultSet as $res) {?>
    										<option value="<?php echo $res->id_tareas_respaldos; ?>"><?php echo $res->id_tareas_respaldos; ?> </option>
    							        <?php } ?>
    								   </select> 
    								  </div>
    								  <div class="col-xs-12 col-md-3 col-lg-3">
        <label for="nombre_bd" class="control-label">Nombre BD:</label>
        <select name="nombre_bd" id="nombre_bd"  class="form-control" >
                                      <option value="" selected="selected">--Seleccione--</option>
    									<?php  foreach($resultBD as $res) {?>
    										<option value="<?php echo $res->nombre_base_datos; ?>"><?php echo $res->nombre_base_datos; ?> </option>
    							        <?php } ?> 
    							         </select>
        </div>
        <div class="col-xs-12 col-md-3 col-lg-3">
        <label for="file_path" class="control-label">Ubicación de Archivo:</label>
        <input type="text" class="form-control" id="file_path" name="file_path" value="">
        </div>
        <div class="col-xs-12 col-md-3 col-lg-3">
        <label for="hora_plan" class="control-label">Hora Planificada:</label>
        <input type="text" data-inputmask="'mask': 'h:s:s'" class="form-control" id="hora_plan"  name="hora_plan" value="">
      
            </div>
            </div> 
            	    <div id="Agregar_div" style ="display:none">
            								  <div class="col-xs-12 col-md-3 col-lg-3">
        <label for="nombre_bd1" class="control-label">Nombre BD:</label>
        <select name="nombre_bd1" id="nombre_bd1"  class="form-control" >
                                      <option value="" selected="selected">--Seleccione--</option>
    									<?php  foreach($resultBD as $res) {?>
    										<option value="<?php echo $res->nombre_base_datos; ?>"><?php echo $res->nombre_base_datos; ?> </option>
    							        <?php } ?> 
    							         </select>
        </div>
        <div class="col-xs-12 col-md-3 col-lg-3">
        <label for="file_path1" class="control-label">Ubicación de Archivo:</label>
        <input type="text" class="form-control" id="file_path1" name="file_path1" value="">
        </div>
        <div class="col-xs-12 col-md-3 col-lg-3">
        <label for="hora_plan1" class="control-label">Hora Planificada:</label>
        <input type="text" data-inputmask="'mask': 'h:s:s'" class="form-control" id="hora_plan1" name="hora_plan1" value="">
      
            </div>
            </div>
            
            <div id="Eliminar_div" style ="display:none">
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                        <label for="id_tarea_respaldos" class="control-label">ID Tarea:</label>
                                        <select name="id_tarea1" id="id_tarea1"  class="form-control" >
                                            <option value="" selected="selected">--Seleccione--</option>
    									<?php  foreach($resultSet as $res) {?>
    										<option value="<?php echo $res->id_tareas_respaldos; ?>"><?php echo $res->id_tareas_respaldos; ?> </option>
    							        <?php } ?>
    								   </select> 
    								  </div>
    	    </div>   
                       
        
       
       
            <div class="row">
			               
			                <div class="col-xs-12 col-md-12 col-lg-12" style="text-align:center; margin-top: 20px;">
                	   		   
            	                  <button  id="bt_Editar" name="Editar" class="btn btn-success" onclick="EditarTarea()"> <i class="glyphicon glyphicon-edit"></i> Editar</button>
        	                   
        	                     
            	                  <button  id="bt_Agregar" name="Agregar" class="btn btn-primary" onclick="AgregarTarea()"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
        	                   
        	                     
            	                  <button  id="bt_Eliminar" name="Eliminar" class="btn btn-danger" onclick="EliminarTarea()"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
        	                    
    	        		    </div>
    	        		    
    	    </div>
			
			  
			  <div id="mensaje_id_grupos" class="errores" style="margin-top: 20px;"></div>
			  <div id="tabla_tareas" style="margin-top: 20px;"></div>
			  
			 				
			  
	   </div>
       </div>
    </section>
    
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Respaldos Generados</h3>
          <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            
          </div>
        </div>

        <div class="box-body">
        	<div id="tabla_detalles"></div>
		</div>
	  </div>
	  
    </section>
    
    
    
  </div>
 
 	<?php include("view/modulos/footer.php"); ?>	

   <div class="control-sidebar-bg"></div>
 </div>
    
    <?php include("view/modulos/links_js.php"); ?>
	
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
   <script src="view/bootstrap/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="view/bootstrap/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="view/bootstrap/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="view/bootstrap/otros/inputmask_bundle/jquery.inputmask.bundle.js"></script>  
    <script src="view/Administracion/js/TareaRespaldos.js?1.2"></script>
	
	
  </body>
</html>   

 