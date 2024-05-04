<?php echo $this->extend('layouts/layoutBase'); ?>

<?php echo $this->section('contenido'); ?>

<div class="row">
        <?php foreach ($noticias as $noticia) : ?>
            <div class="card col-4" style="width: 18rem; margin: auto;">
                <a href="<?= base_url('noticias/' . $noticia['id']); ?>" class="d-block" style="text-decoration: none;">
                    <?php if ($noticia['imagen'] !== '') : ?>
                        <img src="<?= base_url('uploads/') . $noticia['imagen']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Imagen de la noticia">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $noticia['titulo']; ?></h5>
                        <p class="card-text"><?= strlen($noticia['descripcion']) > 100 ? substr($noticia['descripcion'], 0, 100) . '...' : $noticia['descripcion']; ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Categoría: <?= $noticia['id_categoria']; ?></small><br>
                        <small class="text-muted">Fecha de publicación: <?= $noticia['fechaPublicacion']; ?></small>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

<?php echo $this->endSection(); ?>