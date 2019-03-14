<?php 


class TareaRespaldosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
    
    
    public function index(){
        
        session_start();
        
        
        
        
        $tarea_respaldos = new TareaRespaldosModel();
        
        $base_datos = new BaseDatosModel();
        
        $columnasbd = "base_datos.nombre_base_datos";
        
        $idbd = "base_datos.id_base_datos";
        
        $tablabd = "public.base_datos";
        
                   
        $columnas = "tareas_respaldos.id_tareas_respaldos,
                     tareas_respaldos.id_base_datos,
                     base_datos.nombre_base_datos,
                     tareas_respaldos.path_tareas_respaldos,
                     tareas_respaldos.hora_tareas_respaldos";
        $tablas =   "public.tareas_respaldos INNER JOIN public.base_datos
                     ON tareas_respaldos.id_base_datos = base_datos.id_base_datos";
        $where = "1=1";
        
        $id="tareas_respaldos.id_tareas_respaldos";
        
        $resultBD = $base_datos->getCondiciones($columnasbd, $tablabd, $where, $idbd);
        
        $resultSet = $tarea_respaldos->getCondiciones($columnas, $tablas, $where, $id);
              
                
        $this->view_Administracion("TareaRespaldos",array(
            "resultSet"=>$resultSet, "resultBD"=>$resultBD));
        
    }
    
    
    public function cargarTabla()
    {
        
        session_start();
        
           $html="";
        
                    
            $tarea_respaldos = new TareaRespaldosModel();
            
            $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
            
            $columnas = "tareas_respaldos.id_tareas_respaldos,
                     tareas_respaldos.id_base_datos,
                     base_datos.nombre_base_datos,
                     tareas_respaldos.path_tareas_respaldos,
                     tareas_respaldos.hora_tareas_respaldos";
            $tablas =   "public.tareas_respaldos INNER JOIN public.base_datos
                     ON tareas_respaldos.id_base_datos = base_datos.id_base_datos";
            $where = "1=1";
            
            $id="tareas_respaldos.id_tareas_respaldos";
            
            $resultSet = $tarea_respaldos->getCondiciones($columnas, $tablas, $where, $id);
            
           
            if($action == 'ajax')
            {
                
                
              
                
                
                $html.='<div class="col-lg-12 col-md-12 col-xs-12">';
                $html.='<section style="height:200px; overflow-y:scroll;">';
                $html.= "<table id='tabla_tareas_respaldos' class='tablesorter table table-striped table-bordered dt-responsive nowrap dataTables-example'>";
                $html.= "<thead>";
                $html.= "<tr>";
                $html.='<th style="text-align: left;  font-size: 14px;">ID Tarea</th>';
                $html.='<th style="text-align: left;  font-size: 14px;">ID BD</th>';
                $html.='<th style="text-align: left;  font-size: 14px;">Nombre BD</th>';
                $html.='<th style="text-align: left;  font-size: 14px;">Ubicación Archivo</th>';
                $html.='<th style="text-align: left;  font-size: 14px;">Hora Planificada</th>';
                $html.='</tr>';
                $html.='</thead>';
                $html.='<tbody>';
                
                foreach ($resultSet as $res)
                {
                    $html.='<tr>';
                    $html.='<td style="font-size: 12px;">'.$res->id_tareas_respaldos.'</td>';
                    $html.='<td style="font-size: 12px;">'.$res->id_base_datos.'</td>';
                    $html.='<td style="font-size: 12px;">'.$res->nombre_base_datos.'</td>';
                    $html.='<td style="font-size: 12px;">'.$res->path_tareas_respaldos.'</td>';
                    $html.='<td style="font-size: 12px;">'.$res->hora_tareas_respaldos.'</td>';
                    $html.='</tr>';
                }
                
                $html.='</tbody>';
                $html.='</table>';
                $html.='</section></div>';
                
                
                
                echo $html;
                die();
            }
                
            
           
        }
        
        public function cargarTablaDetalles()
        {
            
            session_start();
            $html="";
            
            
            $respaldo_detalles = new RespaldoDetallesModel();
            
            $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
            
            $columnas = "respaldo_detalles.id_respaldo_detalles, respaldo_detalles.nombre_base_datos_respaldo_detalles,
                         respaldo_detalles.fecha_inicio_respaldo_detalles, respaldo_detalles.fecha_fin_respaldo_detalles,
                         respaldo_detalles.id_base_datos, respaldo_detalles.path_respaldo_detalles, 
                         respaldo_detalles.peso_archivo_respaldo_detalles";
            $tablas =   "public.respaldo_detalles";
            $where = "1=1";
            
            $id="respaldo_detalles.id_respaldo_detalles";
            
            $resultSet = $respaldo_detalles->getCondiciones($columnas, $tablas, $where, $id);
            
            
            if($action == 'ajax')
            {
                               
                $html.='<div class="col-lg-12 col-md-12 col-xs-12">';
                $html.='<section style="height:425px; overflow-y:scroll;">';
                $html.= "<table id='tabla_tareas_respaldos' class='tablesorter table table-striped table-bordered dt-responsive nowrap dataTables-example'>";
                $html.= "<thead>";
                $html.= "<tr>";
                $html.='<th style="text-align: left;  font-size: 14px;">Nombre BD</th>';
                $html.='<th style="text-align: left;  font-size: 14px;">Fecha de Inicio</th>';
                $html.='<th style="text-align: left;  font-size: 14px;">Fecha de Fin</th>';
                $html.='<th style="text-align: left;  font-size: 14px;">Ubicaci�n de Archivo</th>';
                $html.='<th style="text-align: left;  font-size: 14px;">Peso de Archivo (Bytes)</th>';
                $html.='</tr>';
                $html.='</thead>';
                $html.='<tbody>';
                
                foreach ($resultSet as $res)
                {
                    $html.='<tr>';
                    $html.='<td style="font-size: 12px;">'.$res->nombre_base_datos_respaldo_detalles.'</td>';
                    $html.='<td style="font-size: 12px;">'.$res->fecha_inicio_respaldo_detalles.'</td>';
                    $html.='<td style="font-size: 12px;">'.$res->fecha_fin_respaldo_detalles.'</td>';
                    $html.='<td style="font-size: 12px;">'.$res->path_respaldo_detalles.'</td>';
                    $html.='<td style="font-size: 12px;">'.$res->peso_archivo_respaldo_detalles.'</td>';
                    $html.='</tr>';
                }
                
                $html.='</tbody>';
                $html.='</table>';
                $html.='</section></div>';
                
                
                
                echo $html;
                die();
            }
            
            
            
        }
        
        public function EditarValor()
        {
            
            session_start();
            $tarea_respaldos = new TareaRespaldosModel();
           
            
            $id_tarea = $_POST['id_tarea'];
            
            
            $tabla = "public.tareas_respaldos";
                
            $whereup ="id_tareas_respaldos=".$id_tarea;
            
            if (isset($_POST['nombre_bd']))
            {
                $nombre_bd=$_POST['nombre_bd'];
                if(!empty ($nombre_bd))
                {
                    $base_datos = new BaseDatosModel();
                    $columnas = "base_datos.id_base_datos";
                    $tablas =   "public.base_datos";
                    $where = "base_datos.nombre_base_datos='".$nombre_bd."'";
                    
                    $id="base_datos.id_base_datos";
                    
                    $resultSet = $base_datos->getCondiciones($columnas, $tablas, $where, $id);
                    
                    $colval="id_base_datos = ".$resultSet[0]->id_base_datos;
                    $tarea_respaldos->UpdateBy($colval ,$tabla , $whereup);
                }
            }
            
            if (isset($_POST['path']))
            {
                $path=$_POST['path'];
                if(!empty ($path))
                {
                                        
                    $colval="path_tareas_respaldos = '".$path."'";
                    $tarea_respaldos->UpdateBy($colval ,$tabla , $whereup);
                }
            }
            
            if (isset($_POST['hora']))
            {
                $hora=$_POST['hora'];
                if(!empty ($hora))
                {
                    
                    $colval="hora_tareas_respaldos = '".$hora."'";
                    $tarea_respaldos->UpdateBy($colval ,$tabla , $whereup);
                }
            }
            
        }
        
        public function AgregarValor()
        {
            session_start();
            $tarea_respaldos = new TareaRespaldosModel();
            $id_base_datos= null;
            $nombre_bd=$_POST['nombre_bd'];
            if(!empty ($nombre_bd))
            {
                $base_datos = new BaseDatosModel();
                $columnas = "base_datos.id_base_datos";
                $tablas =   "public.base_datos";
                $where = "base_datos.nombre_base_datos='".$nombre_bd."'";
                
                $id="base_datos.id_base_datos";
                
                $resultSet = $base_datos->getCondiciones($columnas, $tablas, $where, $id);
                $id_base_datos=$resultSet[0]->id_base_datos;
            }
            $path=$_POST['path'];
            $hora=$_POST['hora'];
            
            $funcion = "ins_tareas_respaldos";
            $parametros = "'$id_base_datos',
                               '$path',
                               '$hora'";
            $tarea_respaldos->setFuncion($funcion);
            $tarea_respaldos->setParametros($parametros);
            $resultado=$tarea_respaldos->Insert();
            
            $columnas = "tareas_respaldos.id_tareas_respaldos";
            $tablas =   "public.tareas_respaldos";
            $where = "1=1";
            
            $id="base_datos.id_base_datos";
                                  
            $resultSet = $tarea_respaldos->getCondicionesDesc($columnas, $tablas, $where, $id);
            
            echo $resultSet[0]->id_tareas_respaldos;          
            
        }
        
        public function EliminarValor()
        {
            session_start();
            $tarea_respaldos = new TareaRespaldosModel();
                        
            $id_tarea = $_POST['id_tarea'];
            $columna = "id_tareas_respaldos";
            
            $tarea_respaldos->deleteBy($columna, $id_tarea);
        }
       
    
    
        
        
        
        
        
        
        
 
    
    
    
}



/*class TareaRespaldosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        session_start();
        /*$tarea_respaldos = new TareaRespaldosModel();
        
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        
        if($action == 'ajax')
        {
        
        $columnas = "tareas_respaldos.id_tareas_respaldos,
                     tareas_respaldos.id_base_datos,
                     base_datos.nombre_base_datos,
                     tareas_respaldos.path_tareas_respaldos,
                     tareas_respaldos.hora_tareas_respaldos";
        $tablas =   "public.tareas_respaldos INNER JOIN public.base_datos
                     ON tareas_respaldos.id_base_datos = base_datos.id_base_datos";
        $where = "1=1";
        
        $id="tareas_respaldos.id_base_datos";
        
        $resultset = $tarea_respaldos->getCondiciones($columnas, $tablas, $where, $id);
        
        $html.='<div class="col-lg-12 col-md-12 col-xs-12">';
        $html.='<section style="height:425px; overflow-y:scroll;">';
        $html.= "<table id='tabla_tareas_respaldos' class='tablesorter table table-striped table-bordered dt-responsive nowrap dataTables-example'>";
        $html.= "<thead>";
        $html.= "<tr>";
        $html.='<th style="text-align: left;  font-size: 12px;">ID Tarea</th>';
        $html.='<th style="text-align: left;  font-size: 12px;">ID BD</th>';
        $html.='<th style="text-align: left;  font-size: 12px;">Nombre BD</th>';
        $html.='<th style="text-align: left;  font-size: 12px;">Ubicación Archivo</th>';
        $html.='<th style="text-align: left;  font-size: 12px;">Hora Planificada</th>';
        $html.='</tr>';
        $html.='</thead>';
        $html.='<tbody>';
        
        foreach ($resultSet as $res)
        {
            $html.='<tr>';
            $html.='<td style="font-size: 11px;">'.$res->id_tareas_respaldos.'</td>';
            $html.='<td style="font-size: 11px;">'.$res->id_base_datos.'</td>';
            $html.='<td style="font-size: 11px;">'.$res->nombre_base_datos.'</td>';
            $html.='<td style="font-size: 11px;">'.$res->path_tareas_respaldos.'</td>';
            $html.='<td style="font-size: 11px;">'.$res->hora_tareas_respaldos.'</td>';
            $html.='</tr>';
        }
       
        $html.='</tbody>';
        $html.='</table>';
        $html.='</section></div>';
        
        echo $html;
        die();
        }
    }
}*/

?>