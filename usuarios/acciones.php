<?php
include('../modelo/conexion.php');
session_start();

switch ($_GET['sw']) {
        case 1:

            $nom=$_GET['nom'];
            $ape=$_GET['ape'];
            $ema=$_GET['email'];
            $pwd=md5($_GET['pwd']);
            $cel=$_GET['cel'];
            $dir=$_GET['dir'];
            $result = mysqli_query($con,"select count(*) from usuarios where email='$ema' ");
            $f = mysqli_fetch_array($result);
            
            if($f[0]==0){
                $ver=mysqli_query($con,"INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `clave`, `celular`, `direccion`, `estado`, `tipo`)"
                        . " VALUES (NULL, '$nom', '$ape', '$ema', '$pwd', '$cel', '$dir', '0', '0')");
                echo 'Se guardo con exito';
            }
            else{
                echo 'Ya este usuario existe';
            }
            
            break;
        case 2:
            $id=$_GET['id'];
            $est=$_GET['est'];
            $nom=$_GET['nom'];
            $ape=$_GET['ape'];
            $ema=$_GET['email']; 
            $cel=$_GET['cel'];
            $dir=$_GET['dir'];
            $tipo=$_GET['tipo'];
            mysqli_query($con,"UPDATE `usuarios` SET `nombre` = '$nom', `apellido` = '$ape', `email` = '$ema', `celular` = '$cel', `direccion` = '$dir', `estado` = '$est', `tipo` = '$tipo' WHERE `usuarios`.`id` ='$id'");
            echo 'Se edito con exito';
            
            break;

            case 3:
               $id=$_GET['id'];
               $query = mysqli_query($con,"delete from usuarios where id='$id' ");
               echo 'Se elimino con exito';
            break;
        case 4:
                 $id=$_GET['id'];
                 $query = mysqli_query($con,"SELECT * FROM usuarios where id='$id' "); //consultA modificada por navabla
                 $fila = mysqli_fetch_array($query);
                 $p = array();
                 $p[0]=$fila[0]; 
                 $p[1]=$fila[1];
                 $p[2]=$fila[2];
                 $p[3]=$fila[3];
                 $p[4]=$fila[4];
                 $p[5]=$fila[5];
                 $p[6]=$fila[6];
                 $p[7]=$fila[7];
                 $p[8]=$fila[8];
        
            echo json_encode($p); 
            exit();
            break;
        case 5:
                 $use=$_GET['use'];
                 $pas=md5($_GET['pas']);
                 $query = mysqli_query($con,"SELECT * FROM usuarios where email='$use' and clave='$pas' and estado=0 "); //consultA modificada por navabla
                 $fila = mysqli_fetch_array($query);
                 if($fila){
                    $_SESSION['id_usuario']=$fila[0];
                    $_SESSION['usuario']=$fila[3]; 
                    $_SESSION['nombre']=$fila[1].' '.$fila[2]; 
                    $_SESSION['tipo']=$fila[8];
                    echo 'true';
                 }else{
                     echo 'false';
                 }
                 
 
            exit();
            break;
            }

