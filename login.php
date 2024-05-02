<?php
session_start();

// Database connection
$pdo = new PDO(
  'mysql:host=localhost;dbname=lab07Tarea',
  'root',
  ''
);

// Function to validate user input
function validateInput($data) {
    // Remove leading and trailing whitespaces
    $data = trim($data);
    // Convert special characters to HTML entities to prevent XSS attacks
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate username and password
  $username = validateInput($_POST['username']);
  $password = validateInput($_POST['password']);

  // Query the database to fetch user data
  $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id_agente = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch();

  // Verify user credentials
  if ($user && password_verify($password, $user['contrasena'])) {
      // Set session variables
      $_SESSION['username'] = $username;
      // Redirect to dashboard
      header("Location: dashboard.php");
      exit();
  } else {
      // Invalid username or password
      $error = "Usuario o contraseña invalida.";
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesión</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="Estilos/loginestilos.css">

</head>
<body>

<div class="container-fluid">
  <div class="row justify-content-end align-items-center" style="height: 100vh;">
    <div class="col-md-6 form-container"> <!-- Agregar una clase para el contenedor del formulario -->
      <h2 class="text-center">Inicio de sesión</h2>
      <?= isset($error) ? "<p class='error-message'>$error</p>" : "" ?>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
          <label for="username">Usuario:</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>





