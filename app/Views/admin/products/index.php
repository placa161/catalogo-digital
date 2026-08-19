<section class="admin-header">
    <div>
        <h1 class="admin-title">Gestión de Productos</h1>
        <p class="admin-subtitle">Administra los muebles disponibles en el catálogo.</p>
    </div>
    <a href="<?= URL_ROOT; ?>/admin/create" class="btn-primary">+ Agregar Mueble</a>
</section>

<div class="admin-table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><span class="code-badge"><?= $product['code']; ?></span></td>
                    <td>
                        <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="table-img">
                    </td>
                    <td><strong><?= $product['name']; ?></strong></td>
                    <td><?= $product['category']; ?></td>
                    <td>
                        <div class="table-actions">
                            <a href="<?= URL_ROOT; ?>/admin/edit/<?= $product['code']; ?>" class="btn-action edit">Editar</a>
                            <a href="#" class="btn-action delete">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>