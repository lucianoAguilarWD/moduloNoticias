<?php echo $this->extend($layout); ?>

<?= $this->section('contenido'); ?>

<main class="container-fluid mt-3">

    <div class="row">
        <?php foreach ($noticias as $noticia) : ?>
            <div class="card col-4" style="width: 600px; height: 800px; margin: auto;">
                <a href="<?= base_url('noticias/' . $noticia['id']); ?>" class="d-block" style="text-decoration: none;">
                    <div class=" card-header">
                        <img src="<?= base_url('uploads/') . $noticia['imagen']; ?>" class="card-img-top" style="width: 540px; height: 350px;" alt="Imagen de la noticia">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?= $noticia['titulo']; ?></h3>
                        <p class="card-text"><small class="text-muted"><?= $noticia['descripcion']; ?></small></p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text"><small class="text-muted">Categoria:<?= $noticia['id_categoria']; ?></small></p>
                        <p class="card-text"><small class="text-muted">Fecha de publicación:<?= $noticia['fechaPublicacion']; ?></small></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?= $this->endSection(); ?>