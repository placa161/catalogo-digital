<section class="admin-header">
    <div>
        <h1 class="admin-title">Nuevo Mueble</h1>
        <p class="admin-subtitle">Ingresa la información básica para publicar un nuevo producto.</p>
    </div>
    <a href="<?= URL_ROOT; ?>/admin" class="btn-secondary">← Volver al Panel</a>
</section>

<div class="form-container">
    <form action="#" method="POST" enctype="multipart/form-data" class="admin-form">
        <div class="form-row">
            <div class="form-group">
                <label for="code">Código del Mueble</label>
                <input type="text" id="code" name="code" placeholder="Ej: SF-8092" required>
            </div>
            
            <div class="form-group">
                <label for="category">Categoría</label>
                <select id="category" name="category" required>
                    <option value="">Selecciona una categoría</option>
                    <option value="Sofás y Seccionales">Sofás y Seccionales</option>
                    <option value="Butacas">Butacas</option>
                    <option value="Complementos">Complementos</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Nombre del Mueble</label>
            <input type="text" id="name" name="name" placeholder="Ej: Sofá Seccional Borgia" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" rows="4" placeholder="Detalles de materiales, acabados y confort..."></textarea>
        </div>

        <div class="form-group">
            <label for="image">Imagen del Producto</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Guardar Producto</button>
        </div>
    </form>
</div>