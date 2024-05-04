<?php echo $this->extend($layout); ?>

<?= $this->section('contenido'); ?>

<main class="container-fluid mt-3 row" style="margin: auto;">
    <section class="col-md-8">
        <div class="card border-0">
            <div>
                <div>
                    <div class="col-md-6 text-end" id="dataPaginacion"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="container row" style="margin: auto;" id="prueba">
                    <?php foreach ($noticias as $noticia) : ?>
                        <?php if ($noticia['imagen'] !== '') : ?>
                            <div class="card col-md-6 border-0" style="max-width: 600px; max-height: 800px; margin: auto;">

                                <div class="card-body">
                                    <a href="<?= base_url('noticias/' . $noticia['id']); ?>"><img class="card-img-top" src="<?= base_url('uploads/') . $noticia['imagen']; ?>" alt="Imagen de referencia" title="<?= $noticia['titulo']; ?>" style="height:300px;"></a>
                                    <div class="text-light bg-dark" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                        Categoría: <?= $noticia['id_categoria']; ?>
                                        <h3><?= strlen($noticia['titulo']) > 36 ? substr($noticia['titulo'], 0, 36) . '...' : $noticia['titulo']; ?></h3>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="col-md-4">
        <div class="card border-0">
            <div>
                <div class="text-end" id="botonesPaginacion"></div>
            </div>
            <div class="card-body">
                <div class="container row" style="margin:auto;">
                    <?php foreach ($noticias as $noticia) : ?>
                        <?php if ($noticia['imagen'] === '') : ?>
                            <a href="<?= base_url('noticias/' . $noticia['id']); ?>">
                                <div class="card col-md-12" style="max-width: 400px; max-height: 600px; margin: auto;">
                                    <div class="card-header bg-dark"></div>
                                    <div class="card-body">
                                        <div class="text-muted">Categoría: <?= $noticia['id_categoria']; ?></div>
                                        <h3 class="text-muted"><?= strlen($noticia['titulo']) > 36 ? substr($noticia['titulo'], 0, 36) . '...' : $noticia['titulo']; ?></h3>
                                    </div>
                                    <div class="card-footer bg-dark"></div>
                                </div>
                                
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?= $this->endSection(); ?>