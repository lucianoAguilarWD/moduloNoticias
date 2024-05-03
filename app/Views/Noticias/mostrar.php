<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="container mt-5">


    <div class="card noticias-muestra">

        <div class="card-header bg-dark">
            <div>
                <?php if($noticia['imagen'] !== ''):?>
                    <img src="<?= base_url('uploads/') . $noticia['imagen']; ?>" class="card-img-top" alt="Imagen de la noticia">
                <?php endif;?>
            </div>
        </div>
        <div class="card-body">
            <h6 class="card-title"><?= $noticia['titulo']; ?></h6>
            <p class="card-text"><small class="text-muted"><?= $noticia['descripcion']; ?></small></p>
            <p class="card-text"><small class="text-muted">Categoria:<?= $noticia['id_categoria']; ?></small></p>
        </div>
        <div class="card-footer bg-dark text-light">
            Fecha de publicación: <?= $noticia['fechaPublicacion']; ?>
        </div>

    </div>


</main>
<?php echo $this->endSection(); ?>