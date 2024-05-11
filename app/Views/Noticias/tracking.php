<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="container-fluid">
    <div class="text-center mt-4">
        <button onclick="goBack();" class="btn confirmacion"><i class="fa-solid fa-circle-arrow-left"></i></button>
    </div>
    <section>
        <div class="card border-0">
            <div class="card-body">
                <div class="container-fluid row" style="margin: auto;" id="prueba">
                    <?php foreach ($seguimientos as $seguimiento) : ?>
                        <div class="card col-md-4" style="max-width: 600px; min-height: 400px; max-height:400px; margin: auto;">

                            <div class="card-body">

                                <h4><?php switch (intval($seguimiento['accion'])) {
                                        case MODIFICO:
                                            echo 'Modifico';
                                            break;
                                        case RECHAZO:
                                            echo 'Rechazo';
                                            break;
                                        case VALIDO:
                                            echo 'Válido';
                                            break;
                                        case DESHIZO:
                                            echo 'Deshizo';
                                            break;
                                        case A_CORREGIR:
                                            echo 'Mando a corregir';
                                            break;
                                        case DESACTIVO:
                                            echo 'Desactivo';
                                            break;
                                    } ?></h4>
                                <?= $seguimiento['fechaCreacion']; ?> <br> <br>
                                <div>
                                    <h5>Antes:</h5>
                                    <p><?= $seguimiento['antes']; ?></p>
                                    <h5>Despues:</h5>
                                    <p><?= $seguimiento['despues']; ?></p>
                                    <h5><?= ($seguimiento['motivo'] !== null) ? 'Motivo' : ''; ?></h5>
                                    <p><?= $seguimiento['motivo'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>



</main>

<?php echo $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<?= $this->endSection(); ?>