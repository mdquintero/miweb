<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario de Contraseña</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="mb-3">Ingrese su nueva contraseña</h2>
        <?php
        if(isset($_GET['mensaje'])) {
            if($_GET['mensaje'] == 'contraseña_cambiada') {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Contraseña cambiada.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            } elseif($_GET['mensaje'] == 'correo_invalido') {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alerta">
                        Correo inválido.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            }
        }
        ?>
        <form action="GuardarContraseña.php" method="POST">
          <div class="form-group">
            <label for="Correo">Correo</label>
            <input type="email" class="form-control" name="CorreoRec" id="CorreoRec" placeholder="Ingrese su correo" required>
          </div>
          <div class="form-group">
            <label for="Contraseña">Contraseña</label>
            <div class="input-group">
              <input type="password" class="form-control" name="ContraseñaRec" id="ContraseñaRec" placeholder="Ingrese su contraseña" required>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">Mostrar</button>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>x|
</body>
</html>
