<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styleREGIS.css"> <!-- Puedes enlazar tu CSS aquí -->
</head>
<body>
    <div class="register-container">
        <h1>Registro de Usuario</h1>
        <form action="register_process.php" method="POST">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div>
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" required>
            </div>
            <div>
                <label for="rol">Rol:</label>
                <select id="rol" name="rol" required>
                    <option value="estudiante">Estudiante</option>
                    <option value="administrador">Administrador</option>
                </select>
            </div>
            <button type="submit">Registrar</button>
        </form>
        <a href="index.php">Volver al Inicio de Sesión</a>
    </div>
</body>
</html>
