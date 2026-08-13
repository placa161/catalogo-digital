
<section class="catalog-header">
    <h1 class="catalog-title">Nuestra Colección</h1>
    <p class="catalog-subtitle">Explora muebles diseñados para espacios modernos. Cotiza directamente con un asesor.</p>
</section>

<div class="product-grid">
    <?php foreach ($products as $product): ?>
        <?php 
            $waMessage = urlencode("Hola! Me interesa cotizar el modelo " . $product['name'] . " (Código: " . $product['code'] . ")");
            $waLink = "https://wa.me/51999999999?text=" . $waMessage; // IMPORTANTE: Cambiar el número de WhatsApp al real
        ?>
        <article class="product-card">
            <div class="product-image-wrapper">
                <span class="product-code"><?= $product['code']; ?></span>
                <a href="<?= URL_ROOT; ?>/producto/<?= $product['code']; ?>">
                    <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="product-image" loading="lazy">
                </a>
            </div>
            
            <div class="product-info">
                <span class="product-category"><?= $product['category']; ?></span>
                <h3 class="product-name">
                    <a href="<?= URL_ROOT; ?>/producto/<?= $product['code']; ?>"><?= $product['name']; ?></a>
                </h3>
                
                <!-- Swatches / Muestras de colores disponibles -->
                <div class="product-swatches">
                    <?php foreach ($product['colors'] as $color): ?>
                        <span class="swatch" style="background-color: <?= $color; ?>;"></span>
                    <?php endforeach; ?>
                </div>

                <a href="<?= $waLink; ?>" target="_blank" class="btn-whatsapp">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                    </svg>
                    Cotizar por WhatsApp
                </a>
            </div>
        </article>
    <?php endforeach; ?>
</div>