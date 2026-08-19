<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Catálogo Exclusivo de Muebles'; ?></title>
    
    <!-- Estilos Globales -->
    <link rel="stylesheet" href="<?= URL_ROOT; ?>/css/main.css">
    
    <?php if (isset($extraCss)): ?>
        <!-- CSS específico cargado desde vistas específicas -->
        <link rel="stylesheet" href="<?= URL_ROOT; ?>/css/<?= $extraCss; ?>.css">
    <?php endif; ?>
</head>
<body>

    <!-- Header Principal -->
    <header class="site-header">
        <div class="container header-inner">
            <a href="<?= URL_ROOT; ?>" class="brand-logo">
                MRE<span>.</span>
            </a>
            
            <nav>
                <ul class="nav-menu">
                    <li><a href="<?= URL_ROOT; ?>" class="nav-link">Inicio</a></li>
                    <li><a href="<?= URL_ROOT; ?>" class="nav-link">Sofás y Seccionales</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contenido Dinámico de la Vista -->
    <main class="main-content">
        <div class="container">
            <?php 
                //var_dump($viewPath);
                // Aquí se renderiza la vista solicitada (Catalog, Detail, etc.)
                if (isset($viewPath) && file_exists($viewPath)) {
                    include $viewPath;
                } else {
                    echo "<p>Error: No se pudo cargar el contenido de la vista.</p>";
                }
            ?>
        </div>
    </main>

    <!-- Footer Principal -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <h4>MRE Muebles</h4>
                    <p>Diseño y confección de muebles de alta calidad. Cotizaciones personalizadas y atención directa por nuestros asesores.</p>
                </div>
                <div class="footer-col">
                    <h4>Atención al Cliente</h4>
                    <p> Showroom Principal</p>
                    <p> Consultas directas vía WhatsApp</p>
                    <p> Lunes a Sábado: 8:00 AM - 6:00 PM</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?= date('Y'); ?>Muebles Eduardo Rojas. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts dinámicos -->
    <?php if (isset($extraJs)): ?>
        <script src="<?= URL_ROOT; ?>/js/<?= $extraJs; ?>.js"></script>
    <?php endif; ?>
</body>
</html>