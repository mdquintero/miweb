<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Secretario/Head/head.php");
require_once ("../../Controlador/UsuarioControlador.php");
$obj = new UsuarioControlador();
$Dato = $obj->mostrar(($_GET['id']));

// $id=$_GET["id"];
// include "../modelo/conexion.php";
// $consulta = "SELECT r.Nombre, r.Codigo, u.Codigo, u.Correo, u.Usuario, u.Contraseña, u.Rol, e.Nombres, e.Apellidos, e.FechaNacimiento, e.Direccion, e.Telefono, e.Cargo, e.NumeroTargetaProfesional, e.Cedula 
// FROM tblroles r 
// JOIN tblusuarios u ON r.Codigo = u.Rol 
// JOIN tblempleados e ON u.Codigo = e.codigoUsuario 
// where '$id' = u.Codigo";
// $resultado = $conexion->query($consulta);
// $datos = $resultado->fetch_assoc();
?>


                        <center><h4>INFORMACION DEL USUARIO</h4></center>
                        <div class="container6" id="container6">
    <div class="main-body" id="main-body">
    
          <div class="row gutters-sm" id="row-gutters-sm-profile">
            <div class="col-md-4 mb-3" id="col-profile-left">
              <div class="card" id="card-profile-image">
                <div class="card-body" id="card-body-profile">
                  <div class="d-flex flex-column align-items-center text-center" id="profile-details">
                    <img src="../image/perfil.png" alt="Admin" class="rounded-circle" width="150" id="profile-image">
                    <div class="mt-3" id="profile-info">
                      <h4> <?= $Dato["Nombres"] ?></h4>
                      <p class="text-secondary mb-1"> <?= $Dato["Cargo"] ?></p>
    
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3" id="card-list-group">
                
              </div>
            </div>
            <div class="col-md-8" id="col-profile-right">
              <div class="card mb-3" id="card-details">
                <div class="card-body" id="card-body-details">
                  <div class="row" id="row-full-name">
                    <div class="col-sm-3" id="label-full-name">
                      <h6 class="mb-0">Nombre de Usuario</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="text-full-name">
                    <?= $Dato["Usuario"] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row" id="row-email">
                    <div class="col-sm-3" id="label-email">
                      <h6 class="mb-0">Nombres</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="text-full">
                    <?= $Dato["Nombres"] ?>
                    </div>
                    <hr>
                  <div class="row" id="row-email">
                    <div class="col-sm-3" id="label-email">
                      <h6 class="mb-0">Apellidos</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="text-full">
                    <?= $Dato["Apellidos"] ?>
                    </div>
                    <hr>
                  </div>
                  <div class="row" id="row-email">
                    <div class="col-sm-3" id="label-email">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="text-email">
                    <?= $Dato["Correo"] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row" id="row-phone">
                    <div class="col-sm-3" id="label-phone">
                      <h6 class="mb-0">Rol</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="text-phone">
                    <?= $Dato["Nombre"] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row" id="row-mobile">
                    <div class="col-sm-3" id="label-mobile">
                      <h6 class="mb-0">Fecha de Nacimiento</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="text-mobile">
                    <?= $Dato["FechaNacimiento"] ?>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>
    
    </div>
</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php
    require_once("c://xampp/htdocs/proyectotls/Vista/Secretario/Head/footer.php");
    ?>
    
</body>

</html>