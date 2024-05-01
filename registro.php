<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="Estilos/registro.css">
</head>
<body>

    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <h2 class="text-center">Registro</h2>
        <form>
            <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
            <label for="agenteID">Agente ID:</label>
            <input type="text" class="form-control" id="agenteID" name="agenteID" required>
            </div>

            <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
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
            <textarea class="form-control" id="descripcionMision" name="descripcionMision" required></textarea>
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
