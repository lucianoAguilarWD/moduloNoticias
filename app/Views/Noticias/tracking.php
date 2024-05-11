<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="container">

    <section class="col-md-8 mt-5">
        <div class="card border-0">
            <div class="card-body">
                <div class="container row" style="margin: auto;" id="prueba">
                    <?php foreach ($seguimientos as $seguimiento) : ?>
                        <div class="card col-md-4 border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                            <div class="card-header bg-dark text-light">
                                Fecha de creación: <?= $seguimiento['fechaCreacion']; ?> <br>
                            </div>
                            <div class="card-body bg-light">
                                <div>
                                    <h3>Motivo</h3>
                                    <p><?= strlen($seguimiento['motivo']) > 36 ? substr($seguimiento['motivo'], 0, 36) . '...' : $seguimiento['motivo']; ?></p>
                                    <h4>Antes:</h4>
                                    <p><?= strlen($seguimiento['antes']) > 36 ? substr($seguimiento['antes'], 0, 36) . '...' : $seguimiento['antes']; ?></p>
                                    <h4>Despues:</h4>
                                    <p><?= strlen($seguimiento['despues']) > 36 ? substr($seguimiento['despues'], 0, 36) . '...' : $seguimiento['despues']; ?></p>
                                </div>
                            </div>
                            <div class="card-footer bg-light"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php echo $this->endSection(); ?>