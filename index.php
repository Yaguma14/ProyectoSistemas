<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styleINICIO.css"> <!-- Puedes enlazar tu CSS aquí -->
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <form action="login.php" method="POST">
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
            <button type="submit">Iniciar Sesión</button>
        </form>
        <a href="register.php">Registrarse</a>
    </div>
</body>
</html>
