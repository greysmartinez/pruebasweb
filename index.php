<?php
session_start();
include 'modelo/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Extreme Tecnology....</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="js/controlador.js?<?php echo rand(1,100) ?>"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">PRUEBA TEC.</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="">Inicio</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li>
              <?php if(isset($_SESSION['usuario'])){
                  echo '<a href="destruirsesion.php">Salir</a>';
                  }else{
                      echo '<a href="#"  data-toggle="modal" data-target="#ModalSesion">Iniciar Sesion</a>';  
                  } ?> </li>
          <li>
              <?php if(!isset($_SESSION['usuario'])){ ?>
              <a href="#" data-toggle="modal" data-target="#ModalRegistrar">Registrate</a>
              <?php } ?>
              
          </li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      
      <?php if(isset($_SESSION['usuario'])){ ?>
        <?php if($_SESSION['tipo']=='1'){ ?>
      <p><a href="#" onclick="lista_usuarios();">Lista de Usuarios</a></p>
        <?php  } ?>
      <p><a href="#" onclick="lista_pqr();">Lista de PQR</a></p>
      <?php  } ?>
    </div>
    <div class="col-sm-8 text-left"> 
        <h1>Welcome <?php if(isset($_SESSION['usuario'])){echo $_SESSION['nombre']; } ?></h1>
        <div id="contenedor">
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
             <hr>
             <h3>Test</h3>
             <p>Lorem ipsum...</p>
        </div>
     
    </div>

  </div>
</div>

<footer class="container-fluid text-center">
  <p>Greys martinez Castro</p>
</footer>

</body>
</html>
<div id="ModalRegistrar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrate Gratis</h4>
      </div>
      <div class="modal-body">
        <div>
            <div class="form-group">
              <label for="email">Email: * </label>
              <input type="email" class="form-control" id="email" placeholder="Escribe tu email" name="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password: * </label>
              <input type="password" class="form-control" id="pwd" placeholder="Tu password" name="pwd">
            </div>
            <div class="form-group">
              <label for="email">Nombre: * </label>
              <input type="text" class="form-control" id="nom" placeholder="Escribe tuNombre" name="email">
            </div>
            <div class="form-group">
              <label for="email">Apellido:</label>
              <input type="text" class="form-control" id="ape" placeholder="Escribe tu apellido" name="email">
            </div>
            
            <div class="form-group">
              <label for="email">Celular:</label>
              <input type="text" class="form-control" id="cel" placeholder="Puede ser el cel o telefono fijo" name="email">
            </div>
            <div class="form-group">
              <label for="email">Dirección:</label>
              <input type="text" class="form-control" id="dir" placeholder="Direccion de residencia" name="email">
            </div>
            
      </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="save()">Registrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<div id="ModalSesion" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inicio de Sesion</h4>
      </div>
      <div class="modal-body">
        <div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="use" placeholder="Escribe tu email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pas" placeholder="Tu password">
            </div>
            
      </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="validar();">Inicia Sesion</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>