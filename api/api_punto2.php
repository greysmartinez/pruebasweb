<?php
require_once 'headers.php';
include('../modelo/conexion.php');

if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_GET['id'])){
            $id = " and  ";
        }else{
            $id = '';
        }
        $query = $con->query("select * from pqr where id_usuario=".$_GET['id']." ");
            $datos= array();
            while($result = $query->fetch_assoc()){
                    $datos[] = $result;
            }
            echo (json_encode($datos));
}
if($_SERVER['REQUEST_METHOD']=='POST'){
     $data = json_decode(file_get_contents("php://input"));
            $fecha_actual = date("d-m-Y");
            $tipo = $data->tipo;
            if($tipo=='Peticion'){
                $dia = 7;
            }elseif($tipo=='Peticion'){
                $dia = 3;
            }else{
                $dia = 2;
            }
             $limite =  date("Y-m-d",strtotime($registro."+ ".$dia." days")); 
             
      $query = $con->query("insert into pqr(`asunto`, `tipo`, `id_usuario`, `estado`, `fecha_reg`, `fecha_lim`) "
              . "values ('".$data->asunto."','".$data->tipo."','".$data->id_usuario."','Nuevo','".date("Y-m-d")."','".$limite."') ");
      if($query){
          $data -> id = $con->insert_id;
           echo (json_encode($data));
      }else{
          
           echo (json_encode(array('stado'=>'error')));
      }
}
if($_SERVER['REQUEST_METHOD']=='PUT'){
    if(isset($_GET['id'])){
        $id = $con->real_escape_string($_GET['id']);
        $data = json_decode(file_get_contents("php://input"));

            $estado=$data->estado;
            if($estado=='Nuevo'){
                $next_estado = 'En Ejecucion';
            }else{
                $next_estado = 'Cerrado';
            }
            
         $query = $con->query("update pqr set estado='$next_estado' where id='$id' ");

      if($query){
           echo '1';
      }else{
           echo '0';
      }
         
    }else{
         echo (json_encode(array('estado'=>'sin datos')));
    }
}
if($_SERVER['REQUEST_METHOD']=='DELETE'){
     if(isset($_GET['id'])){
        $id = $con->real_escape_string($_GET['id']);
        $data = json_decode(file_get_contents("php://input"));
         $query = $con->query("delete from pqr  where id='$id' ");
      if($query){
           echo (json_encode(array('estado'=>'eliminado')));
      }else{
           echo (json_encode(array('estado'=>'error')));
      }
         
    }else{
         echo (json_encode(array('estado'=>'sin datos..')));
    }
}
