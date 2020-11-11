<?php
session_start();
 if($_SESSION['tipo']==0){
            $disabled = 'disabled';
        }else{
            $disabled = '';
        }
?>
<div>
            <div class="form-group">
              <label for="femail">Email: * </label>
              <input type="hidden" class="form-control" id="id">
              <input type="email" class="form-control" id="femail" placeholder="Escribe tu email" >
            </div>
            <div class="form-group">
              <label for="femail">Nombre: * </label>
              <input type="text" class="form-control" id="fnom" placeholder="Escribe tuNombre" name="email">
            </div>
            <div class="form-group">
              <label for="email">Apellido:</label>
              <input type="text" class="form-control" id="fape" placeholder="Escribe tu apellido" name="email">
            </div>
            
            <div class="form-group">
              <label for="email">Celular:</label>
              <input type="text" class="form-control" id="fcel" placeholder="Puede ser el cel o telefono fijo" name="email">
            </div>
            <div class="form-group">
              <label for="email">Dirección:</label>
              <input type="text" class="form-control" id="fdir" placeholder="Direccion de residencia" name="email">
            </div>
            <div class="form-group">
              <label for="email">Estado:</label>
              <select id="fest" class="form-control" <?php echo $disabled; ?>>
                <option value="">Todos</option>
                <option value='0'>Activo</option>
                <option value="1">No Activo</option>
            </select>
            </div>
    <div class="form-group">
              <label for="email">Tipo:</label>
              <select id="ftipo" class="form-control" <?php echo $disabled; ?>>
            
                <option value='0'>Invitado</option>
                <option value="1">Administrador</option>
            </select>
            </div>
     <div class="modal-footer">
         <button type="button" class="btn btn-primary" onclick="update()">Editar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="lista_usuarios()">Cancelar</button>
      </div>
            
      </div>
<script>
$(function(){
    mostrar_datos(<?php echo $_GET['id'] ?>);
});
</script>
