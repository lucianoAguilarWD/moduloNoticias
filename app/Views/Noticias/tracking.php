<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="container">
    <section class="container">

        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header bg-dark text-light">
                <h4><?= $usuario; ?>:
                    <?php
                    switch (intval($seguimiento['accion'])) {
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
                            echo 'Mandó a corregir';
                            break;
                        case DESACTIVO:
                            echo 'Desactivo';
                            break;
                    }
                    ?>
                </h4>
            </div>

            <div class="card-body">
                <div>
                    <h5>Antes:</h5>
                    <ul>
                        <?php
                        $motivo = $seguimiento['antes'];
                        $motivoParts = explode("|", $motivo);

                        foreach ($motivoParts as $part) {
                            echo "<li>$part</li>";
                        }
                        ?>
                    </ul>
                    <h5>Después:</h5>
                    <ul>
                        <?php
                        $motivo = $seguimiento['despues'];
                        $motivoParts = explode("|", $motivo);

                        foreach ($motivoParts as $part) {
                            echo "<li>$part</li>";
                        }
                        ?>
                    </ul>
                    <?php if ($seguimiento['motivo'] !== null) { ?>
                        <h5>Motivo:</h5>
                        <p><?= $seguimiento['motivo'] ?></p>
                    <?php } ?>
                </div>
            </div>

            <div class="card-footer bg-dark text-light">
                <?= $seguimiento['fechaCreacion']; ?>
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