<?php 
include '../modelo/conexion.php';
session_start();
    $asunto= $_GET['asunto'];
    $est=$_GET['est'];
    $tipo=$_GET['tipo'];
    
   $page= $_GET['page'];
   $user= $_GET['user'];
   $rad= $_GET['rad'];
   if($rad==''){
       $radicado = '';
   }else{
       $radicado = " and b.id='$rad' ";
   }
   if($_SESSION['tipo']=='1'){
       $usuario = '';  //si es administrador muestra todas las pqr
   }else{
       //si es usuario solo muestra lo del usuario
       $usuario = " and b.id_usuario='".$_SESSION['id_usuario']."' ";  
   }
 
            $request = mysqli_query($con,"SELECT count(*) FROM  usuarios a, pqr b where a.id=b.id_usuario and b.asunto like '%".$asunto."%' and b.estado like '".$est."%' and b.tipo like '".$tipo."%' and a.nombre like '%".$user."%' $radicado $usuario ");

            if($request){
                    $request = mysqli_fetch_row($request);
                    $num_items = $request[0];
            }else{
                    $num_items = 0;
            }
            $rows_by_page = 5;
            $last_page = ceil($num_items/$rows_by_page);

$limit = 'LIMIT ' .($page - 1) * $rows_by_page .',' .$rows_by_page; 
$request_ac = mysqli_query($con,"SELECT b.id,b.asunto,b.tipo,a.nombre,a.apellido,b.fecha_reg,b.fecha_lim,b.estado  FROM  usuarios a, pqr b where a.id=b.id_usuario and b.asunto like '%".$asunto."%' and b.estado like '".$est."%' and b.tipo like '".$tipo."%' and a.nombre like '%".$user."%' $radicado $usuario  " .$limit );
 $total2=0;
	while($fila=mysqli_fetch_array($request_ac))
	{  
        $estado = "'".$fila['estado']."'";
        if($fila['estado']=='Cerrado'){
            $disabled = 'disabled';
        }else{
            if($_SESSION['tipo']=='1'){
                 $disabled = '';
            }else{
                 $disabled = 'disabled';
            }
        }
        if($fila['fecha_lim']==date("Y-m-d")){
            $color = '#F7F9CA'; // se vence el dia de hoy
        }
        if($fila['fecha_lim']>date("Y-m-d")){
            $color = '#E9EEE0'; //indica que no esta vencida 
        }
        if($fila['fecha_lim']<date("Y-m-d")){
            $color = '#FCEDE2'; //indica que se vencio la fecha
        }
        echo '<tr bgcolor="'.$color.'">'
        . '<td>'.$fila['id'].'</td>'
        . '<td>'.$fila['tipo'].'</td>'
        . '<td>'.$fila['asunto'].'</td>'
        . '<td>'.$fila['nombre'].' '.$fila['apellido'].'</td>'
        . '<td>'.$fila['fecha_reg'].'</td>'
        . '<td>'.$fila['fecha_lim'].'</td>'
        . '<td>'.$fila['estado'].'</td>'
        . '<td><button onclick="editarpqr('.$fila['id'].','.$estado.')" '.$disabled.' class="btn btn-primary">Editar</button></td>'
        . '<td><button onclick="borrarpqr('.$fila['id'].')" '.$disabled.' class="btn btn-danger">Borrar</button></td>';
  }
   echo '<tr><td colspan="9">';
                if($page>1){?>
                        <img src="images/at1.png"  onclick="mostrar(1)" style="cursor: pointer;">
                        <img src="images/at2.png"  onclick="mostrar(<?php echo $page - 1;?>)" style="cursor: pointer;">
                <?php
              }else{
                        ?><img src="images/at1.png"> <img src="images/at2.png"><?php
                }
               
                ?>
                        (<b>Pagina</b> <input type="text" id="page" value="<?php echo $page;?>" style="width: 30px; height: 20px" disabled><b>de</b><?php echo $last_page;?>)
                <?php
               
                if($page<$last_page){?>
                        <img src="images/sig1.png"  onclick="mostrar(<?php echo $page + 1;?>)" style="cursor: pointer;">
                        <img src="images/sig2.png" onclick="mostrar(<?php echo $last_page;?>)" style="cursor: pointer;">
                <?php
                }else{
                        ?><img src="images/sig1.png"> <img src="images/sig2.png"> <?php
                }
                
                echo 'Cantidad de registro '.$num_items; 
                echo '| <a href="pqr/descargar_excel.php?rad='.$rad.'&tipo='.$tipo.'&asunto='.$asunto.'&est='.$est.'&user='.$user.'">Descargar Excel</a>';
                 echo '</td></tr>';
?>
 </div>
</div>

