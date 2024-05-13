<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="container">
    <section class="container">

        <div class="card" style="margin: auto;">

            <div class="card-header bg-dark text-light">
                <h4><?= $usuario; ?>: <?php switch (intval($seguimiento['accion'])) {
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
            </div>

            <div class="card-body">
                <div>
                    <h5>Antes:</h5>
                    <p><?= $seguimiento['antes']; ?></p>
                    <h5>Despues:</h5>
                    <p><?= $seguimiento['despues']; ?></p>
                    <h5><?= ($seguimiento['motivo'] !== null) ? 'Motivo' : ''; ?></h5>
                    <p><?= $seguimiento['motivo'] ?></p>
                </div>
            </div>

            <div class="card-footer bg-dark text-light">
                <?= $seguimiento['fechaCreacion']; ?> <br> <br>
            </div>

        </div>

        <div class="text-center mt-4">
            <button onclick="goBack();" class="btn confirmacion"><i class="fa-solid fa-circle-arrow-left"></i></button>
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