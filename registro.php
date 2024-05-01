<?php
session_start();

// Database connection
$pdo = new PDO(
    'mysql:host=localhost;dbname=lab07Tarea',
    'root',
    ''
);

// Función para validar y limpiar los datos del formulario
function validateInput($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y limpiar los datos del formulario
    $agenteID = validateInput($_POST['agenteID']);
    $contrasenah = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Cifrar la contraseña
    $nombre = validateInput($_POST['nombre']);
    $departamentoID = validateInput($_POST['departamentoID']);
    $numMisiones = validateInput($_POST['numMisiones']);
    $descripcionMision = validateInput($_POST['descripcionMision']);

    //Chequear si el agenteid ya existe
    $stmt = $pdo->prepare("SELECT id_agente FROM usuarios WHERE id_agente = ?");
    $stmt->execute([$agenteID]);
    $existingUser = $stmt->fetch();

    if($existingUser) {
        $error = "El nombre de usuario ya está en uso.";
    } else {
        // Insertar datos del usuario en la tabla usuarios
        $insertStmt = $pdo->prepare("INSERT INTO usuarios (id_agente, contrasena) VALUES (?, ?)");
        $insertStmt->execute([$agenteID, $contrasenah]);

        // Obtener el ID del usuario recién insertado
        $usuarioID = $pdo->lastInsertId();

        // Insertar datos del agente en la tabla agentes
        
        $insertStmt = $pdo->prepare("INSERT INTO agentes (nombre,id_agente,departamento_id,num_misiones,des_mision) VALUES (?, ?, ?, ?, ?)");
        $insertStmt->execute([$nombre, $agenteID, $departamentoID, $numMisiones, $descripcionMision ]);

        // Redirigir a otra página después del registro
        header("Location: login.php");
        exit();
    }
    
}
    

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Agente Secreto</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="Estilos/registro.css">
</head>
<body>
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <h2 class="text-center">Registro de Agente Secreto</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
            <label for="agenteID">Agente ID:</label>
            <input type="text" class="form-control" id="agenteID" name="agenteID" required>
            </div>

            <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>

            <div class="form-group">
            <label for="departamentoID">Departamento ID:</label>
            <input type="text" class="form-control" id="departamentoID" name="departamentoID" required>
            </div>

            <div class="form-group">
            <label for="numMisiones">Número de misiones:</label>
            <input type="number" class="form-control" id="numMisiones" name="numMisiones" required>
            </div>

            <div class="form-group">
            <label for="descripcionMision">Descripción de la nueva misión:</label>
            <textarea class="form-control" id="descripcionMision" name="descripcionMision" ></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
        </div>
    </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

