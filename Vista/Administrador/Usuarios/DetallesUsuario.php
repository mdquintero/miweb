<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/head.php");
require_once ("../../../Controlador/UsuarioControlador.php");
$obj = new UsuarioControlador();
$Dato = $obj->mostrar(($_GET['id']));
?>
</table>
  
    
      <div class="col-md-6 offset-md-3">
        <div class="card mt-5 fs-6" >
          <div class="card-header " >
            Detalles de Usuario
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">
                <strong>Código de usuario:</strong> <?=$Dato['Codigo']  ?>
              </li>
              <li class="list-group-item">
                <strong>Nombres:</strong> <?= $Dato['Nombres'] ?>
              </li>
              <li class="list-group-item">
                <strong>Correo Electrónico:</strong> <?= $Dato['Correo'] ?>
              </li>
              <li class="list-group-item">
                <strong>Rol:</strong>  <?= $Dato['Nombre'] ?>
              </li>
              <li class="list-group-item">
                <strong>Fecha de Nacimiento:</strong> <?= $Dato['FechaNacimiento'] ?>
              </li>
              <li class="list-group-item">
                <strong>Dirección:</strong> <?= $Dato['Direccion'] ?>
              </li>
              <li class="list-group-item">
                <strong>Teléfono:</strong> <?= $Dato['Telefono'] ?>
              </li>
              <li class="list-group-item">
                <strong>Cargo:</strong> <?= $Dato['Cargo'] ?>
              </li>
              <li class="list-group-item">
                <strong>Número de Tarjeta Profesional:</strong> <?= $Dato['NumeroTargetaProfesional'] ?>
              </li>
              <li class="list-group-item">
                <strong>Cédula:</strong> <?= $Dato['Cedula'] ?>
              </li>
            </ul>
          </div>
          <div class="card-footer">
            <a href="index.php" class="btn btn-secondary">Volver</a>
            <a href="Editar.php?id=<?= $Dato['Codigo'] ?>" class="btn btn-primary">Modificar</a>
            <a href="Eliminar.php?id=<?= $Dato['Codigo'] ?>" class="btn btn-danger float-end">Eliminar</a>
          </div>
        </div>
      </div>
    
  
<?php
  require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/footer.php");
?>
