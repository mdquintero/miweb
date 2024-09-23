<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña</title>
  <style>
    /* Estilos básicos para el body */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-image: url('../image/fondo_registro.jpg.jpeg');
      background-size: cover;
      background-position: center;
      font-family: Georgia;
    }

    /* Estilos para el formulario */
    form {
      width: 28%;
      padding: 20px;
      background-color: #BFC9CA;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      text-align: center;
    }

    /* Estilos para el título */
    h2 {
      margin-bottom: 40px;
      color: black;
    }

    /* Estilos para el párrafo */
    p {
      font-size: 15px;
      color: black;
      margin-bottom: 20px;
    }

    /* Estilos para los campos de entrada */
    input[type="email"],
    input[type="submit"] {
      width: calc(100% - 20%);
      padding: 12px;
      margin-bottom: 15px;
      border-radius: 10px;
      border: 1px solid #ddd;
      outline: none;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    /* Centrando el texto en el campo de entrada de correo electrónico */
    input[type="email"] {
      text-align: center; /* Centra el texto horizontalmente */
      line-height: 1.5; /* Ajusta la altura de la línea para centrar verticalmente */
    }

    /* Efecto de foco en el campo de correo electrónico */
    input[type="email"]:focus {
      border-color: green;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
    }

    /* Estilos para el botón de envío */
    input[type="submit"] {
      background-color: #007bff;
      color: white;
      cursor: pointer;
      border: none;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
    }

    /* Efecto hover en el botón de envío */
    input[type="submit"]:hover {
      background-color: #0056b3;
      transform: scale(1.02);
    }

    /* Estilos para pantallas pequeñas */
    @media (max-width: 480px) {
      form {
        width: 90%;
      }

      input[type="email"],
      input[type="submit"] {
        width: calc(100% - 10px);
      }
    }
  </style>
</head>
<body>
  <form action="recuperacion.php" method="post">
    <h2>Recuperar Contraseña</h2>
    <p>Ingresa tu dirección de correo electrónico para recuperar tu contraseña</p>
    <input type="email" name="email" placeholder="Correo Electrónico" required>
    <input type="submit" value="Recuperar Contraseña">
  </form>
</body>
</html>
