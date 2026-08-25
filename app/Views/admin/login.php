<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Panel de Administración</title>
    <!-- Vinculación limpia con main.css usando la constante de URL -->
    <link rel="stylesheet" href="<?= URL_ROOT ?>/css/main.css">
</head>
<body class="login-container">

    <div class="login-card">
        <h1>Administración</h1>
        <p class="subtitle">Ingresa tus credenciales para acceder</p>

        <?php if (!empty($error)): ?>
            <div class="alert-error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="<?= URL_ROOT ?>/admin/login" method="POST">
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required placeholder="admin@ejemplo.com" autofocus>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn-submit">Iniciar Sesión</button>
        </form>
    </div>

</body>
</html>