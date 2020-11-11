<?php
include('../modelo/conexion.php');
session_start();

switch ($_GET['sw']) {
        case 1:

            $tipo=$_GET['tipo'];
            $asunto=$_GET['asunto'];
            $user=$_GET['user'];
            $estado=($_GET['estado']);
            $registro=$_GET['registro'];
            //$limite=$_GET['limite'];

            if($tipo=='Peticion'){
                $dia = 7;
            }elseif($tipo=='Peticion'){
                $dia = 3;
            }else{
                $dia = 2;
            }
             $limite =  date("Y-m-d",strtotime($registro."+ ".$dia." days")); 
            

                $ver=mysqli_query($con,"INSERT INTO `pqr` (`asunto`, `tipo`, `id_usuario`, `estado`, `fecha_reg`, `fecha_lim`)"
                        . " VALUES ('$asunto', '$tipo', '$user', '$estado', '$registro', '$limite')");
                if($ver){
                    echo 'Se guardo con exito ';
                }else{
                    echo 'Ocuarrio un error al guardar la PQR'.mysqli_error($con);
                }
                

            
            break;
        case 2:
            $id=$_GET['id'];
            $estado=($_GET['est']);
            if($estado=='Nuevo'){
                $next_estado = 'En Ejecucion';
            }else{
                $next_estado = 'Cerrado';
            }
            $result = mysqli_query($con,"update pqr set estado='$next_estado' where id='$id' ");
            if($result){
                echo 'Se cambio el estado a '.$next_estado;
            }else{
                echo 'Ocurrio un error :'.mysqli_error($con);
            }
            
            
            break;
        case 3:
            $id=$_GET['id'];
               $query = mysqli_query($con,"delete from pqr where id='$id' ");
               echo 'Se elimino con exito';
            
            break;

            }

