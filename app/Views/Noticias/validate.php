<?php echo $this->extend($layout); ?>

<?= $this->section('contenido'); ?>

<main class="container-fluid">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="validar-tab" data-bs-toggle="tab" data-bs-target="#validar" type="button" role="tab" aria-controls="validar" aria-selected="true">Validar</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="historial-tab" data-bs-toggle="tab" data-bs-target="#historial" type="button" role="tab" aria-controls="historial" aria-selected="false">Historial</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="sValidar-tab" data-bs-toggle="tab" data-bs-target="#sValidar" type="button" role="tab" aria-controls="sValidar" aria-selected="false">Publicaciones sin validar</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="validar" role="tabpanel" aria-labelledby="validar-tab" tabindex="0">
            <div class="container card border-0">
                <table class="table table-hover table-bordered mt-3 text-center" aria-describedby="titulo">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($validar as $valid) : ?>
                            <tr>
                                <td><?= strlen($valid['titulo']) > 36 ? substr($valid['titulo'], 0, 36) . '...' : $valid['titulo']; ?></td>
                                <td><?= strlen($valid['descripcion']) > 36 ? substr($valid['descripcion'], 0, 36) . '...' : $valid['descripcion']; ?></td>
                                <td><?= $valid['categorias']; ?></td>
                                <td>
                                    <a href="<?= base_url('noticias/' . $valid['id']); ?>" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                    <button onclick="" class="btn btn-info"><i class="fa-regular fa-square-plus"></i></button>
                                    <button onclick="" class="btn btn-info"><i class="fas fa-pencil-alt"></i></button>
                                    <button onclick="" class="btn btn-info"><i class="fa-solid fa-square-xmark"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane" id="historial" role="tabpanel" aria-labelledby="historial-tab" tabindex="0">
            <div class="container card border-0">
                <table class="table table-hover table-bordered mt-3 text-center" aria-describedby="titulo">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Acción</th>
                            <th scope="col">Motivo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($seguimientos as $seguimiento) : ?>
                            <tr>
                                <td><?= strlen($seguimiento['noticiaT']) > 36 ? substr($seguimiento['noticiaT'], 0, 36) . '...' : $seguimiento['noticiaT']; ?></td>
                                <td><?php switch($seguimiento['accion']){case 1: echo 'Corrigio';break;case 2: echo 'Rechazo';break; case 3: echo 'Valido';break; case 4: echo 'Publico';break;}?></td>
                                <td><?= strlen($seguimiento['motivo']) > 36 ? substr($seguimiento['motivo'], 0, 36) . '...' : $seguimiento['motivo']; ?></td>
                                <td>
                                    <a href="<?= base_url('noticias/' . $seguimiento['noticiaI']); ?>" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                    <button onclick="" class="btn btn-info"><i class="fa-solid fa-reply"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane" id="sValidar" role="tabpanel" aria-labelledby="sValidar-tab" tabindex="0">
            <div class="container card border-0">
                <table class="table table-hover table-bordered mt-3 text-center" aria-describedby="titulo">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($sinValidar as $sValid) : ?>
                            <tr>
                                <td><?= strlen($sValid['titulo']) > 36 ? substr($sValid['titulo'], 0, 36) . '...' : $sValid['titulo']; ?></td>
                                <td><?= strlen($sValid['descripcion']) > 36 ? substr($sValid['descripcion'], 0, 36) . '...' : $sValid['descripcion']; ?></td>
                                <td><?= $sValid['categorias']; ?></td>
                                <td>
                                    <a href="<?= base_url('noticias/' . $sValid['id']); ?>" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                    <button onclick="" class="btn btn-info"><i class="fa-solid fa-reply"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<script>
    const triggerTabList = document.querySelectorAll('#myTab button')
    triggerTabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', event => {
            event.preventDefault()
            tabTrigger.show()
        })
    })
</script>

<?= $this->endSection(); ?>