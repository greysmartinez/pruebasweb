<?php
session_start();
 if($_SESSION['tipo']==0){
            $disabled = 'disabled';
        }else{
            $disabled = '';
        }
?>
<script src="usuarios/funciones.js?<?php echo rand(1,100) ?>"></script>

 <h2>Lista de Usuarios</h2>
  <p>Puede editar y eliminar usuarios</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>pqr</th>
        <th>Editar</th>
         <th>Borrar</th>
      </tr>
      <tr>
        <td><input type="text" id="bema" class="form-control" <?php echo $disabled ?>></td>
        <td><input type="text" id="bnom" class="form-control"></td>
        <td><input type="text" id="bape" class="form-control"></td>
        <td>-</td>
        <td><select id="best" class="form-control">
                <option value="">Todos</option>
                <option value='0'>Activo</option>
                <option value="1">No Activo</option>
            </select></td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
      </tr>
    </thead>
    <tbody id="mostrar">
      
    </tbody>
  </table>
         
         
         
  
     

      





