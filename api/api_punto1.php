<?php
require_once 'headers.php';
include('../modelo/conexion.php');

if($_SERVER['REQUEST_METHOD']=='GET'){
                 $use=$_GET['use'];
                 $pas=md5($_GET['pas']);
                 $query = $con->query("SELECT * FROM usuarios where email='$use' and clave='$pas' and estado=0 "); //consultA modificada por navabla
                 $fila = $query->fetch_assoc();
                 if($fila){
                    $user=$fila[3]; 
                    $nombre=$fila[1].' '.$fila[2]; 
                    $tipo=$fila[8];
                    $res   = 'true';
                 }else{
                     $user  =''; 
                     $nombre=''; 
                     $tipo  ='';
                     $res   = 'false';
                 }
            $datos= array();
            $datos[0] = $user;
            $datos[1] = $nombre;
            $datos[2] = $tipo;
            $datos[3] = $res;
            echo (json_encode($datos));
}
if($_SERVER['REQUEST_METHOD']=='POST'){
     $data = json_decode(file_get_contents("php://input"));
      $query = $con->query("insert into usuarios(nombre,apellido,email,clave,celular,direccion,estado,tipo) "
              . "values ('".$data->nombre."','".$data->apellido."','".$data->email."','".$data->clave."','".$data->celular."','".$data->direccion."','".$data->estado."','".$data->tipo."') ");
      if($query){
          $data -> id = $con->insert_id;
           echo (json_encode($data));
      }else{
          
           echo (json_encode(array('stado'=>'error')));
      }
}

