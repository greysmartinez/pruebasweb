<?php
include('../modelo/conexion.php');
session_start();
 if($_SESSION['tipo']==0){
            $disabled = 'disabled';
        }else{
            $disabled = '';
        }
?>
<script src="pqr/funciones.js?<?php echo rand(1,100) ?>"></script>

 <h2>Lista de PQR</h2>
          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Rad</th>
        <th>Tipo</th>
        <th>Asunto</th>
        <th>Usuario</th>
        <th>Fecha_Registro</th>
        <th>Fecha_Limite</th>
        <th>Estado</th>
        <th>Editar</th>
         <th>Borrar</th>
      </tr>
      <tr>
        <td><input type="text" id="brad" class="form-control"></td>
        <td><select id="btipo" class="form-control">
                <option value="">Todas</option>
                <option value='Peticion'>Peticion</option>
                <option value="Queja">Queja</option>
                <option value="Reclamo">Reclamo</option>
              </select></td>
        <td><input type="text" id="basu" class="form-control"></td>
        <td><input type="text" id="buser" class="form-control"></td>
        <td></td>
        <td></td>
        <td><select id="best" class="form-control">
                <option value="">Todos</option>
                <option value="Nuevo">Nuevo</option>
                <option value="En ejecucion">En ejecución</option>
                <option value="Cerrado">Cerrado</option>
            </select></td>
            <td></td>
            <td></td>
      </tr>
    </thead>
    <tbody id="mostrar">
      
    </tbody>
  </table>
         
         
         
  
     

      





