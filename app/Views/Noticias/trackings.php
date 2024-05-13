<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="container-fluid">

    <div class="tab-content">
        <div class="tab-pane active" id="validar" role="tabpanel" aria-labelledby="validar-tab" tabindex="0">
            <div class="container card border-0">
                <table class="table table-hover table-bordered mt-3 text-center" aria-describedby="titulo">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Usuario</th>
                            <th scope="col">Detalles</th>
                            <th scope="col">Motivo</th>
                            <th scope="col">Vista completa</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($seguimientos as $seguimiento) : ?>
                            <tr>
                                <td><?= $seguimiento['usuario'] ?></td>
                                <td><?php switch (intval($seguimiento['accion'])) {
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
                                    } ?></td>
                                <td><?= strlen($seguimiento['motivo']) > 22 ? substr($seguimiento['motivo'], 0, 22) . '...' : $seguimiento['motivo']; ?></td>
                                <td>
                                    <a href="<?= base_url('noticias/seguimiento/' . $seguimiento['id']); ?>" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-center mt-4">
            <button onclick="goBack();" class="btn confirmacion"><i class="fa-solid fa-circle-arrow-left"></i></button>
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