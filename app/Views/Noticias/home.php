<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="containter-fluid">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="borrador-tab" data-bs-toggle="tab" data-bs-target="#borrador" type="button" role="tab" aria-controls="borrador" aria-selected="true">Borrador</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="validando-tab" data-bs-toggle="tab" data-bs-target="#validando" type="button" role="tab" aria-controls="validando" aria-selected="false">Validandose</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="desactivadas-tab" data-bs-toggle="tab" data-bs-target="#desactivadas" type="button" role="tab" aria-controls="desactivadas" aria-selected="false">Desactivadas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="publicadas-tab" data-bs-toggle="tab" data-bs-target="#publicadas" type="button" role="tab" aria-controls="publicadas" aria-selected="false">Publicadas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="corregir-tab" data-bs-toggle="tab" data-bs-target="#corregir" type="button" role="tab" aria-controls="corregir" aria-selected="false">A corregir</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="rechazadas-tab" data-bs-toggle="tab" data-bs-target="#rechazadas" type="button" role="tab" aria-controls="rechazadas" aria-selected="false">Rechazadas</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-----------------------------------------------BORRADOR----------------------------------------------------->
        <div class="tab-pane active" id="borrador" role="tabpanel" aria-labelledby="borrador-tab" tabindex="0">
            <section class="col-md-8 mt-5">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="container row" style="margin: auto;" id="prueba">
                            <?php foreach ($borrador as $draft) : ?>
                                <div class="card col-md-4 border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                    <div class="card-header bg-dark text-light">
                                        Fecha de creación: <?= $draft['fechaCreacion']; ?> <br>
                                    </div>
                                    <div class="card-body bg-light">
                                        <div>
                                            <h3 class="bg-info" style="border-radius: 5px;"><?= strlen($draft['titulo']) > 24 ? substr($draft['titulo'], 0, 24) . '...' : $draft['titulo']; ?></h3>
                                            Categoría: <?= $val['categorias']; ?>
                                            <p><?= strlen($draft['descripcion']) > 36 ? substr($draft['descripcion'], 0, 36) . '...' : $draft['descripcion']; ?></p>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-dark">
                                        <a href="" class="btn btn-light"><i class="fa-solid fa-check"></i></a>
                                        <a href="<?= base_url('noticias/' . $draft['id'] . '/edit'); ?>" class="btn btn-light"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="" class="btn btn-light"><i class="fa-solid fa-reply"></i></a>
                                        <button onclick="modalConfirmacion('<?= base_url('noticias/' . $draft['id']); ?>');" class="btn btn-light"><i class="fa-solid fa-trash"></i></button>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-----------------------------------------------VALIDANDOSE----------------------------------------------------->
        <div class="tab-pane" id="validando" role="tabpanel" aria-labelledby="validando-tab" tabindex="0">
            <section class="col-md-8 mt-5">
                <div class="card border-0">
                    <div>
                        <div>
                            <div class="col-md-6 text-end" id="dataPaginacion"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container row" style="margin: auto;" id="prueba">
                            <?php foreach ($validacion as $val) : ?>
                                <div class="card col-md-4 border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                    <div class="card-header bg-dark text-light">
                                        Fecha de creación: <?= $val['fechaCreacion']; ?> <br>
                                    </div>
                                    <div class="card-body bg-light">
                                        <div>
                                            <h3 class="bg-info" style="border-radius: 5px;"><?= strlen($val['titulo']) > 24 ? substr($val['titulo'], 0, 24) . '...' : $val['titulo']; ?></h3>
                                            Categoría: <?= $val['categorias']; ?>
                                            <p><?= strlen($val['descripcion']) > 36 ? substr($val['descripcion'], 0, 36) . '...' : $val['descripcion']; ?></p>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-dark">
                                        <a href="" class="btn btn-light"><i class="fa-solid fa-pen-ruler"></i></a>
                                        <button onclick="modalConfirmacion('<?= base_url('noticias/' . $val['id']); ?>');" class="btn btn-light"><i class="fa-solid fa-trash"></i></button>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-----------------------------------------------DESACTIVADAS----------------------------------------------------->
        <div class="tab-pane" id="desactivadas" role="tabpanel" aria-labelledby="desactivadas-tab" tabindex="0">
            <section class="col-md-8 mt-5">
                <div class="card border-0">
                    <div>
                        <div>
                            <div class="col-md-6 text-end" id="dataPaginacion"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container row" style="margin: auto;" id="prueba">
                            <?php foreach ($desactivadas as $desactivada) : ?>
                                <div class="card col-md-4 border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                    <div class="card-header bg-dark text-light">
                                        Fecha de creación: <?= $desactivada['fechaCreacion']; ?> <br>
                                    </div>
                                    <div class="card-body bg-light">
                                        <div>
                                            <h3 class="bg-info" style="border-radius: 5px;"><?= strlen($desactivada['titulo']) > 24 ? substr($desactivada['titulo'], 0, 24) . '...' : $desactivada['titulo']; ?></h3>
                                            Categoría: <?= $desactivada['categorias']; ?>
                                            <p><?= strlen($desactivada['descripcion']) > 36 ? substr($desactivada['descripcion'], 0, 36) . '...' : $desactivada['descripcion']; ?></p>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-dark">
                                        <a href="" class="btn btn-light"><i class="fa-solid fa-bolt"></i></a>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-----------------------------------------------PUBLICADAS----------------------------------------------------->
        <div class="tab-pane" id="publicadas" role="tabpanel" aria-labelledby="publicadas-tab" tabindex="0">
            <section class="col-md-8 mt-5">
                <div class="card border-0">
                    <div>
                        <div>
                            <div class="col-md-6 text-end" id="dataPaginacion"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container row" style="margin: auto;" id="prueba">
                            <?php foreach ($publicadas as $publicada) : ?>
                                <div class="card col-md-4 border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                    <div class="card-header bg-dark text-light">
                                        <h3 ><?= strlen($publicada['titulo']) > 24 ? substr($publicada['titulo'], 0, 24) . '...' : $publicada['titulo']; ?></h3>
                                    </div>
                                    <div class="card-body bg-light">
                                        <div>
                                            
                                            Categoría: <?= $publicada['categorias']; ?>
                                            <p><?= strlen($publicada['descripcion']) > 36 ? substr($publicada['descripcion'], 0, 36) . '...' : $publicada['descripcion']; ?></p>
                                            Fecha de publicación: <?= $publicada['fechaPublicacion']; ?> <br>
                                            Fecha de Expiración: <?= $publicada['fechaExpiracion']; ?>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-dark text-light">
                                        <a href="<?= base_url('noticias/' . $publicada['id']); ?>" class="btn btn-light"><i class="fa-solid fa-eye"></i></a>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-----------------------------------------------CORREGIR----------------------------------------------------->
        <div class="tab-pane" id="corregir" role="tabpanel" aria-labelledby="corregir-tab" tabindex="0">
            <section class="col-md-8 mt-5">
                <div class="card border-0">
                    <div>
                        <div>
                            <div class="col-md-6 text-end" id="dataPaginacion"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container row" style="margin: auto;" id="prueba">
                            <?php foreach ($corregir as $correct) : ?>
                                <div class="card col-md-4 border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                    <div class="card-header bg-dark text-light">
                                        Fecha de creación: <?= $correct['fechaCreacion']; ?> <br>
                                    </div>
                                    <div class="card-body bg-light">
                                        <div>
                                            <h3 class="bg-info" style="border-radius: 5px;"><?= strlen($correct['titulo']) > 24 ? substr($correct['titulo'], 0, 24) . '...' : $correct['titulo']; ?></h3>
                                            Categoría: <?= $correct['categorias']; ?>
                                            <p><?= strlen($correct['descripcion']) > 36 ? substr($correct['descripcion'], 0, 36) . '...' : $correct['descripcion']; ?></p>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-dark">
                                        <a href="<?= base_url('noticias/' . $correct['id'] . '/edit'); ?>" class="btn btn-light"><i class="fas fa-pencil-alt"></i></a>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-----------------------------------------------RECHAZADAS----------------------------------------------------->
        <div class="tab-pane" id="rechazadas" role="tabpanel" aria-labelledby="rechazadas-tab" tabindex="0">
            <section class="col-md-8 mt-5">
                <div class="card border-0">
                    <div>
                        <div>
                            <div class="col-md-6 text-end" id="dataPaginacion"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container row" style="margin: auto;" id="prueba">
                            <?php foreach ($rechazadas as $rechazada) : ?>
                                <div class="card col-md-4 border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                    <div class="card-header bg-dark text-light">
                                        Fecha de creación: <?= $rechazada['fechaCreacion']; ?> <br>
                                    </div>
                                    <div class="card-body bg-light">
                                        <div>
                                            <h3 class="bg-info" style="border-radius: 5px;"><?= strlen($rechazada['titulo']) > 24 ? substr($rechazada['titulo'], 0, 24) . '...' : $rechazada['titulo']; ?></h3>
                                            Categoría: <?= $rechazada['categorias']; ?>
                                            <p><?= strlen($rechazada['descripcion']) > 36 ? substr($rechazada['descripcion'], 0, 36) . '...' : $rechazada['descripcion']; ?></p>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-dark">
                                        <button onclick="modalConfirmacion('<?= base_url('noticias/' . $val['id']); ?>');" class="btn btn-light"><i class="fa-solid fa-trash"></i></button>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

<?php echo $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<script>
    //? código de bootstrap que hace funcionar las tabs
    const triggerTabList = document.querySelectorAll('#myTab button')
    triggerTabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', event => {
            event.preventDefault()
            tabTrigger.show()
        })
    })

    //* modal para descartar una noticia en borrador como en lista para validar
    const modalConfirmacion = (url) => {
        Modal.danger({
            confirm: true,
            title: '¿Desea Eliminar la noticia?',
            content: `Si elimina la noticia no podra recuperarla luego.
            <form id="form-elimina" action="${url}" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE" />
            </form>
        `,
            onAccept: () => {
                document.getElementById("form-elimina").submit()
            }
        })
    }
</script>

<script src="<?= base_url('assets/js/home.js'); ?>"></script>

<?= $this->endSection(); ?>