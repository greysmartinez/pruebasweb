<?php
include('../modelo/conexion.php');
session_start();
?>
<script src="pqr/funciones.js?<?php echo rand(1,100) ?>"></script>
<div>
            <div class="form-group">
              <label for="email">Tipo:</label>
              <select id="ftipo" class="form-control">
                <option value="">Seleccione</option>
                <option value='Peticion'>Peticion</option>
                <option value="Queja">Queja</option>
                <option value="Reclamo">Reclamo</option>
              </select>
            </div>
            <div class="form-group">
              <label for="femail">Asunto: * </label>
              <input type="hidden" class="form-control" id="id">
              <input type="text" class="form-control" id="fasunto" placeholder="Escribe el asunto" >
            </div>
            <div class="form-group">
              <label for="femail">Usuario: * </label>
              <select id="fuser" class="form-control">
           
                <?php
                $query = mysqli_query($con,"select * from usuarios where estado=0 and id='".$_GET['id']."' ");
                while ($row = mysqli_fetch_array($query)) {
                    echo '<option value="'.$row['id'].'">'.$row['nombre'].' '.$row['apellido'].'</option>';
                }
                
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="email">Estado:</label>
              <select id="festado" class="form-control" disabled>
                <option value="Nuevo">Nuevo</option>
                <option value="En ejecucion">En ejecucion</option>
                <option value="Cerrado">Cerrado</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="email">Fecha Registro:</label>
              <input type="text" class="form-control" id="freg" disabled value="<?php echo date("Y-m-d") ?>">
            </div>
            <div class="form-group">
              <label for="email">Fecha Limite:</label>
              <input type="text" class="form-control" id="flim" disabled>
            </div>

     <div class="modal-footer">
         <button type="button" class="btn btn-primary" onclick="registrar_pqr()">Registrar PQR</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="lista_pqr()">Cancelar</button>
      </div>
            
      </div>

