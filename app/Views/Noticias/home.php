<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="containter-fluid">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="borrador-tab" data-bs-toggle="tab" data-bs-target="#borrador" type="button" role="tab" aria-controls="borrador" aria-selected="true">Borrador</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="validando-tab" data-bs-toggle="tab" data-bs-target="#validando" type="button" role="tab" aria-controls="validando" aria-selected="false">Validándose</button>
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
        <li class="nav-item ms-auto" role="presentation">
            <button onclick="reloadPage();" class="btn confirmacion"><i class="fa-solid fa-rotate-right"></i></button>
        </li>
        <li class="nav-item" role="presentation">
            <button onclick="info();" class="btn confirmacion"><i class="fa-solid fa-info"></i></button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-----------------------------------------------BORRADOR----------------------------------------------------->
        <div class="tab-pane active" id="borrador" role="tabpanel" aria-labelledby="borrador-tab" tabindex="0">
            <section class="container mt-5">
                <div class="card border-0">
                    <?php if (count($borrador) > 0) : ?>
                        <div class="card-body">
                            <div class="container row">
                                <?php foreach ($borrador as $draft) : ?>
                                    <div class="col-md-4 mb-2" style="margin: auto;">
                                        <a href="<?= base_url('noticias/' . $draft['id']); ?>" class="d-block" style="text-decoration: none;">
                                            <div class="card border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                                <div class="card-header bg-dark text-light">
                                                    <?= $draft['fechaCreacion']; ?> <br>
                                                </div>
                                                <div class="card-body bg-light">
                                                    <div>
                                                        <h3><?= strlen($draft['titulo']) > 15 ? substr($draft['titulo'], 0, 15) . '...' : $draft['titulo']; ?></h3>
                                                        Categoría: <?= $draft['categorias']; ?>
                                                        <p><?= strlen($draft['descripcion']) > 36 ? substr($draft['descripcion'], 0, 36) . '...' : $draft['descripcion']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="card-footer"></div>
                                            </div>
                                        </a>
                                        <div class="bg-light text-center">
                                            <a href="<?= base_url('noticias/' . $draft['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-eye"></i></a>
                                            <button onclick="modalCambioAValidar('<?= base_url('noticias/validar/' . $draft['id']); ?>', <?= $draft['version'] ?>);" class="btn confirmacion"><i class="fa-solid fa-check"></i></button>
                                            <a href="<?= base_url('noticias/' . $draft['id'] . '/edit'); ?>" class="btn confirmacion"><i class="fas fa-pencil-alt"></i></a>
                                            <?php if (intval($draft['version']) > 0 && intval($draft['estado']) == BORRADOR) : ?>
                                                <button onclick="modalDeshacer('<?= base_url('noticias/deshacer/' . $draft['id']); ?>', <?= $draft['version'] ?>);" class="btn confirmacion"><i class="fa-solid fa-rotate-left"></i></button>
                                            <?php endif; ?>
                                            <?php if (intval($draft['version']) !== 0) : ?>
                                                <a href="<?= base_url('noticias/seguimientos/' . $draft['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-table-list"></i></a>
                                            <?php endif; ?>
                                            <?php if (intval($draft['version']) === 0) : ?>
                                                <button onclick="modalDesactivar('<?= base_url('noticias/desactivar/' . $draft['id']); ?>', <?= $draft['version'] ?>);" class="btn confirmacion"><i class="fa-solid fa-minus"></i></button>
                                            <?php endif; ?>
                                            <button onclick="modalConfirmacion('<?= base_url('noticias/' . $draft['id']); ?>');" class="btn confirmacion"><i class="fa-solid fa-trash"></i></button>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="card border-0 mt-5">
                            <h1 class="display-4">¡Bienvenido! Aún no tienes noticias en el borrador.</h1>
                            <p class="lead">En esta sección, encontrarás todas tus noticias pendientes de edición. Recuerda que el límite de noticias permitidas para editar es de tres.</p>
                            <hr class="my-4">
                            <p>Utilizamos clases de utilidad para la tipografía y el espaciado, creando un diseño atractivo para destacar las propiedades disponibles.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
        <!-----------------------------------------------VALIDANDOSE----------------------------------------------------->
        <div class="tab-pane" id="validando" role="tabpanel" aria-labelledby="validando-tab" tabindex="0">
            <section class="container mt-5">
                <div class="card border-0">
                    <?php if (count($validacion) > 0) : ?>
                        <div class="card-body">
                            <div class="container row" >
                                <?php foreach ($validacion as $val) : ?>
                                    <div class="col-md-4 mb-2" style="margin: auto;">
                                        <a href="<?= base_url('noticias/' . $val['id']); ?>" class="d-block" style="text-decoration: none;">
                                            <div class="card border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                                <div class="card-header bg-dark text-light">
                                                    <?= $val['fechaCreacion']; ?> <br>
                                                </div>
                                                <div class="card-body bg-light">
                                                    <div>
                                                        <h3><?= strlen($val['titulo']) > 15 ? substr($val['titulo'], 0, 15) . '...' : $val['titulo']; ?></h3>
                                                        Categoría: <?= $val['categorias']; ?>
                                                        <p><?= strlen($val['descripcion']) > 36 ? substr($val['descripcion'], 0, 36) . '...' : $val['descripcion']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="card-footer"></div>
                                            </div>
                                        </a>
                                        <div class="bg-light text-center">
                                            <a href="<?= base_url('noticias/' . $val['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-eye"></i></a>
                                            <button onclick="modalCambioABorrador('<?= base_url('noticias/borrador/' . $val['id']); ?>', <?= $val['version'] ?>);" class="btn confirmacion"><i class="fa-solid fa-pen-ruler"></i></button>
                                            <?php if (intval($val['version']) !== 0) : ?>
                                                <a href="<?= base_url('noticias/seguimientos/' . $val['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-table-list"></i></a>
                                            <?php endif; ?>
                                            <?php if (intval($val['version']) === 0) : ?>
                                                <button onclick="modalDesactivar('<?= base_url('noticias/desactivar/' . $val['id']); ?>', <?= $val['version'] ?>);" class="btn confirmacion"><i class="fa-solid fa-minus"></i></button>
                                            <?php endif; ?>
                                            <button onclick="modalConfirmacion('<?= base_url('noticias/' . $val['id']); ?>');" class="btn confirmacion"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="card border-0 mt-5">
                            <h1 class="display-4">¡Bienvenido! Aún no tienes noticias validandose.</h1>
                            <p class="lead">En esta sección, encontrarás todas tus noticias pendientes de validación para poder ser publicadas</p>
                            <hr class="my-4">
                            <p>Utilizamos clases de utilidad para la tipografía y el espaciado, creando un diseño atractivo para destacar las propiedades disponibles.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
        <!-----------------------------------------------DESACTIVADAS----------------------------------------------------->
        <div class="tab-pane" id="desactivadas" role="tabpanel" aria-labelledby="desactivadas-tab" tabindex="0">
            <section class="container mt-5">
                <div class="card border-0">
                    <?php if (count($desactivadas) > 0) : ?>
                        <div class="card-body">
                            <div class="container row">
                                <?php foreach ($desactivadas as $desactivada) : ?>
                                    <div class="col-md-4 mb-2" style="margin: auto;">
                                        <a href="<?= base_url('noticias/' . $desactivada['id']); ?>" class="d-block" style="text-decoration: none;">
                                            <div class="card border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                                <div class="card-header bg-dark text-light">
                                                    <?= $desactivada['fechaCreacion']; ?> <br>
                                                </div>
                                                <div class="card-body bg-light">
                                                    <div>
                                                        <h3><?= strlen($desactivada['titulo']) > 15 ? substr($desactivada['titulo'], 0, 15) . '...' : $desactivada['titulo']; ?></h3>
                                                        Categoría: <?= $desactivada['categorias']; ?>
                                                        <p><?= strlen($desactivada['descripcion']) > 36 ? substr($desactivada['descripcion'], 0, 36) . '...' : $desactivada['descripcion']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer"></div>
                                        </a>
                                        <div class="bg-light text-center">
                                            <a href="<?= base_url('noticias/' . $desactivada['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-eye"></i></a>
                                            <button onclick="modalActivar('<?= base_url('noticias/activar/' . $desactivada['id']); ?>');" class="btn confirmacion"><i class="fa-solid fa-bolt"></i></button>
                                            <?php if (intval($desactivada['version']) !== 0) : ?>
                                                <a href="<?= base_url('noticias/seguimientos/' . $desactivada['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-table-list"></i></a>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="card border-0 mt-5">
                            <h1 class="display-4">¡Bienvenido! Aún no tienes noticias desactivadas.</h1>
                            <p class="lead">En esta sección, verás todas las noticias que has desactivado. Aquí podrás volver a activarlas si es necesario.</p>
                            <hr class="my-4">
                            <p>Utilizamos clases de utilidad para la tipografía y el espaciado, creando un diseño atractivo para destacar las propiedades disponibles.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
        <!-----------------------------------------------PUBLICADAS----------------------------------------------------->
        <div class="tab-pane" id="publicadas" role="tabpanel" aria-labelledby="publicadas-tab" tabindex="0">
            <section class="container mt-5">
                <div class="card border-0">
                    <?php if (count($publicadas) > 0) : ?>
                        <div class="card-body">
                            <div class="container row">
                                <?php foreach ($publicadas as $publicada) : ?>
                                    <div class="col-md-4 mb-2" style="margin: auto;">
                                        <a href="<?= base_url('noticias/' . $publicada['id']); ?>" class="d-block" style="text-decoration: none;">
                                            <div class="card border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                                <div class="card-header bg-dark text-light">
                                                    <h3><?= strlen($publicada['titulo']) > 15 ? substr($publicada['titulo'], 0, 15) . '...' : $publicada['titulo']; ?></h3>
                                                </div>
                                                <div class="card-body bg-light">
                                                    <div>

                                                        Categoría: <?= $publicada['categorias']; ?>
                                                        <p><?= strlen($publicada['descripcion']) > 36 ? substr($publicada['descripcion'], 0, 36) . '...' : $publicada['descripcion']; ?></p>
                                                        Fecha de publicación: <?= $publicada['fechaPublicacion']; ?> <br>
                                                        Fecha de Expiración: <?= $publicada['fechaExpiracion']; ?>
                                                    </div>
                                                </div>
                                                <div class="card-footer"></div>

                                            </div>
                                        </a>
                                        <div class="bg-light text-center">
                                            <a href="<?= base_url('noticias/' . $publicada['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-eye"></i></a>
                                            <?php if (intval($publicada['version']) !== 0) : ?>
                                                <a href="<?= base_url('noticias/seguimientos/' . $publicada['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-table-list"></i></a>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="card border-0 mt-5">
                            <h1 class="display-4">¡Bienvenido! Aún no tienes noticias publicadas.</h1>
                            <p class="lead">En esta sección, encontrarás todas tus noticias publicadas que aún no finalizaron.</p>
                            <hr class="my-4">
                            <p>Utilizamos clases de utilidad para la tipografía y el espaciado, creando un diseño atractivo para destacar las propiedades disponibles.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
        <!-----------------------------------------------CORREGIR----------------------------------------------------->
        <div class="tab-pane" id="corregir" role="tabpanel" aria-labelledby="corregir-tab" tabindex="0">
            <section class="container mt-5">
                <div class="card border-0">
                    <?php if (count($corregir) > 0) : ?>
                        <div class="card-body">
                            <div class="container row">
                                <?php foreach ($corregir as $correct) : ?>
                                    <div class="col-md-4 mb-2" style="margin: auto;">
                                        <a href="<?= base_url('noticias/' . $correct['id']); ?>" class="d-block" style="text-decoration: none;">
                                            <div class="card border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                                <div class="card-header bg-dark text-light">
                                                    <?= $correct['fechaCreacion']; ?> <br>
                                                </div>
                                                <div class="card-body bg-light">
                                                    <div>
                                                        <h3><?= strlen($correct['titulo']) > 15 ? substr($correct['titulo'], 0, 15) . '...' : $correct['titulo']; ?></h3>
                                                        Categoría: <?= $correct['categorias']; ?>
                                                        <p><?= strlen($correct['descripcion']) > 36 ? substr($correct['descripcion'], 0, 36) . '...' : $correct['descripcion']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="card-footer"></div>
                                            </div>
                                        </a>
                                        <div class="bg-light text-center">
                                            <a href="<?= base_url('noticias/' . $correct['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-eye"></i></a>
                                            <a href="<?= base_url('noticias/' . $correct['id'] . '/edit'); ?>" class="btn confirmacion"><i class="fas fa-pencil-alt"></i></a>
                                            <?php if (intval($correct['version']) !== 0) : ?>
                                                <a href="<?= base_url('noticias/seguimientos/' . $correct['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-table-list"></i></a>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="card border-0 mt-5">
                            <h1 class="display-4">¡Bienvenido! Aún no tienes ninguna corrección por hacer.</h1>
                            <p class="lead">En esta sección, encontrarás todas tus noticias que fueron enviadas a corregir y sus motivos.</p>
                            <hr class="my-4">
                            <p>Utilizamos clases de utilidad para la tipografía y el espaciado, creando un diseño atractivo para destacar las propiedades disponibles.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
        <!-----------------------------------------------RECHAZADAS----------------------------------------------------->
        <div class="tab-pane" id="rechazadas" role="tabpanel" aria-labelledby="rechazadas-tab" tabindex="0">
            <section class="container mt-5">
                <div class="card border-0">
                    <?php if (count($rechazadas) > 0) : ?>
                        <div class="card-body">
                            <div class="container row">
                                <?php foreach ($rechazadas as $rechazada) : ?>
                                    <div class="col-md-4 mb-2" style="margin: auto;">
                                        <a href="<?= base_url('noticias/' . $rechazada['id']); ?>" class="d-block" style="text-decoration: none;">
                                            <div class="card border-0" style="max-width: 600px; max-height: 800px; margin: auto;">
                                                <div class="card-header bg-dark text-light">
                                                    <?= $rechazada['fechaCreacion']; ?> <br>
                                                </div>
                                                <div class="card-body bg-light">
                                                    <div>
                                                        <h3><?= strlen($rechazada['titulo']) > 15 ? substr($rechazada['titulo'], 0, 15) . '...' : $rechazada['titulo']; ?></h3>
                                                        Categoría: <?= $rechazada['categorias']; ?>
                                                        <p><?= strlen($rechazada['descripcion']) > 36 ? substr($rechazada['descripcion'], 0, 36) . '...' : $rechazada['descripcion']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="card-footer"></div>

                                            </div>
                                        </a>
                                        <div class="bg-light text-center">
                                            <a href="<?= base_url('noticias/' . $rechazada['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-eye"></i></a>
                                            <?php if (intval($rechazada['version']) !== 0) : ?>
                                                <a href="<?= base_url('noticias/seguimientos/' . $rechazada['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-table-list"></i></a>
                                            <?php endif; ?>
                                            <button onclick="modalConfirmacion('<?= base_url('noticias/' . $rechazada['id']); ?>');" class="btn confirmacion"><i class="fa-solid fa-trash"></i></button>
                                        </div>

                                    </div>

                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <div class="card border-0 mt-5">
                                <h1 class="display-4">¡Bienvenido! Aún no tienes noticias rechazadas.</h1>
                                <p class="lead">En esta sección, encontrarás todas tus noticias que fueron rechazadas y sus motivos</p>
                                <hr class="my-4">
                                <p>Utilizamos clases de utilidad para la tipografía y el espaciado, creando un diseño atractivo para destacar las propiedades disponibles.</p>
                            </div>
                        <?php endif; ?>
                        </div>
                </div>
            </section>
        </div>
        <div class="container">
            <?php if (session()->getFlashdata('error') !== null) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    <strong><?= session()->getFlashdata('error'); ?></strong>
                </div>
            <?php endif; ?>
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
            content: `Si elimina la noticia no podrá recuperarla luego.
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

    const modalDeshacer = (url, version) => {
        Modal.warning({
            confirm: true,
            title: '¿Desea deshacer la modificación hecha?',
            content: `Siempre puede volver a revertir está decisión
            <form id="form-deshacer" action="${url}" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="version" value="${version}" />
                <input type="hidden" name="_method" value="PUT" />
            </form>
        `,
            onAccept: () => {
                document.getElementById("form-deshacer").submit()
            }
        })
    }

    const modalDesactivar = (url, version) => {
        Modal.warning({
            confirm: true,
            title: '¿Desea desactivar la noticia?',
            content: `Siempre puede volver a activar la noticia en la pestaña de desactivadas
            <form id="form-desactivar" action="${url}" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="version" value="${version}" />
                <input type="hidden" name="_method" value="PUT" />
            </form>
        `,
            onAccept: () => {
                document.getElementById("form-desactivar").submit()
            }
        })
    }

    const modalActivar = (url) => {
        Modal.success({
            confirm: true,
            title: '¿Desea activar la noticia?',
            content: `Deberá tener en cuenta que solo puede tener tres noticias en borrador
            <form id="form-activar" action="${url}" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT" />
            </form>
        `,
            onAccept: () => {
                document.getElementById("form-activar").submit()
            }
        })
    }

    const modalCambioABorrador = (url, version) => {
        Modal.confirm({
            confirm: true,
            title: '¿Desea enviar a borrador?',
            content: `Deberá tener en cuenta que solo puede tener tres noticias en borrador
            <form id="form-enviarABorrador" action="${url}" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="version" value="${version}" />
                <input type="hidden" name="_method" value="PUT" />
            </form>
        `,
            onAccept: () => {
                document.getElementById("form-enviarABorrador").submit()
            }
        })
    }

    const modalCambioAValidar = (url, version) => {
        Modal.confirm({
            confirm: true,
            title: '¿Desea publicar la noticia?',
            content: `Deberá esperar a que validen la noticia antes de ser publicada
            <form id="form-enviarAValidar" action="${url}" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="version" value="${version}" />
                <input type="hidden" name="_method" value="PUT" />
            </form>
        `,
            onAccept: () => {
                document.getElementById("form-enviarAValidar").submit()
            }
        })
    }

    const info = () => {
        Modal.confirm({
            confirm: false,
            title: '<h1 class="display-6">Ayuda sobre la recarga de página</h1>',
            content: `
            <p class="lead">Siempre puede recargar la página para poder actualizar las secciones de ser necesario.</p>
            `
        })
    }

    function reloadPage() {
        location.reload();
    }
</script>

<?= $this->endSection(); ?>