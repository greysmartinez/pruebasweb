<?php 
include '../modelo/conexion.php';
session_start();

    $nom= $_GET['nom'];
    $est=$_GET['est'];
    $ape=$_GET['ape'];
    
   $page= $_GET['page'];

       if($_SESSION['tipo']==0){
            $ema = $_SESSION['usuario'];
        }else{
            $ema=$_GET['ema'];
        }
 
            $request = mysqli_query($con,"SELECT count(*) FROM usuarios where nombre like '".$nom."%' and apellido like '".$ape."%' and email like '".$ema."%' and estado like '".$est."%'  ");

            if($request){
                    $request = mysqli_fetch_row($request);
                    $num_items = $request[0];
            }else{
                    $num_items = 0;
            }
            $rows_by_page = 5;
            $last_page = ceil($num_items/$rows_by_page);

$limit = 'LIMIT ' .($page - 1) * $rows_by_page .',' .$rows_by_page; 
$request_ac = mysqli_query($con,"SELECT * FROM usuarios where nombre like '%".$nom."%' and apellido like '".$ape."%' and email like '".$ema."%' and estado like '".$est."%'  " .$limit );
 $total2=0;
	while($fila=mysqli_fetch_array($request_ac))
	{  
        if($fila['estado']=='0'){
            $est = 'Activo';
        }else{
            $est = 'No activo';
        }
        if($fila['tipo']=='0'){
            $tipo = 'Usuario';
            $disabled = '';
        }else{
            $tipo  = 'Administrador';
            $disabled = 'disabled';
        }
        echo '<tr>'
        . '<td>'.$fila['email'].'</td>'
        . '<td>'.$fila['nombre'].'</td>'
        . '<td>'.$fila['apellido'].'</td>'
        . '<td>'.$est.'</td>'
        . '<td>'.$tipo.'</td>'
                . '<td><button onclick="formulariopqr('.$fila['id'].')" class="btn btn-info">PQR</button></td>'
        . '<td><button onclick="editar('.$fila['id'].')" class="btn btn-primary">Editar</button></td>'
        . '<td><button onclick="borrar('.$fila['id'].')" class="btn btn-danger" '.$disabled.'>Borrar</button></td>';
  }
   echo '<tr><td colspan="7">';
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
                 echo '</td></tr>';
?>
 </div>
</div>

