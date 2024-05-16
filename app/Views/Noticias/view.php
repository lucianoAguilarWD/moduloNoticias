<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="container mt-5">


    <div class="card noticias-muestra">

        <div class="card-header bg-dark">
            <div>
                <?php if ($noticia['imagen'] !== '' && $noticia['imagen'] !== NULL) : ?>
                    <img src="<?= base_url('public/uploads/') . $noticia['imagen']; ?>" class="card-img-top" alt="Imagen de la noticia">
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">
            <h6 class="card-title"><?= $noticia['titulo']; ?></h6>
            <p class="card-text"><small class="text-muted"><?= $noticia['descripcion']; ?></small></p>
            <p class="card-text"><small class="text-muted">Categoría:<?= $noticia['categoria']; ?></small></p>
        </div>
        <div class="card-footer bg-dark text-light">
            <?= $noticia['fechaPublicacion']; ?>
        </div>

        <div class="text-center mt-4">
            <button onclick="goBack();" class="btn confirmacion"><i class="fa-solid fa-circle-arrow-left"></i></button>
        </div>
    </div>


</main>
<?php echo $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<?= $this->endSection(); ?>