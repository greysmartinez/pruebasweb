<?php
header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=reporte_pqr_".date("YmdHis").".xls");
header("Pragma: no-cache");
header("Expires: 0");
include '../modelo/conexion.php';
session_start();
    $asunto= $_GET['asunto'];
    $est=$_GET['est'];
    $tipo=$_GET['tipo'];
    

   $user= $_GET['user'];
   $rad= $_GET['rad'];
   if($rad==''){
       $radicado = '';
   }else{
       $radicado = " and b.id='$rad' ";
   }
 
   echo '<table>
       <tr>
        <th>Rad</th>
        <th>Tipo</th>
        <th>Asunto</th>
        <th>Usuario</th>
        <th>Fecha_Registro</th>
        <th>Fecha_Limite</th>
        <th>Estado</th>
      </tr>';
$request_ac = mysqli_query($con,"SELECT b.id,b.asunto,b.tipo,a.nombre,a.apellido,b.fecha_reg,b.fecha_lim,b.estado  FROM  usuarios a, pqr b where a.id=b.id_usuario and b.asunto like '%".$asunto."%' and b.estado like '".$est."%' and b.tipo like '".$tipo."%' and a.nombre like '%".$user."%' $radicado  "  );
 $total2=0;
	while($fila=mysqli_fetch_array($request_ac))
	{  
        $estado = "'".$fila['estado']."'";
        if($fila['estado']=='Cerrado'){
            $disabled = 'disabled';
        }else{
            $disabled = '';
        }
        echo '<tr>'
        . '<td>'.$fila['id'].'</td>'
        . '<td>'.$fila['tipo'].'</td>'
        . '<td>'.$fila['asunto'].'</td>'
        . '<td>'.$fila['nombre'].' '.$fila['apellido'].'</td>'
        . '<td>'.$fila['fecha_reg'].'</td>'
        . '<td>'.$fila['fecha_lim'].'</td>'
        . '<td>'.$fila['estado'].'</td>';
  }
  echo '</table>';
?>