<?php echo $this->extend($layout); ?>

<?= $this->section('contenido'); ?>

<main class="container-fluid mt-2">

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
        <li class="nav-item ms-auto" role="presentation">
            <button onclick="reloadPage();" class="btn confirmacion"><i class="fa-solid fa-rotate-right"></i></button>
        </li>
        <li class="nav-item" role="presentation">
            <button onclick="info();" class="btn confirmacion"><i class="fa-solid fa-info"></i></button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="validar" role="tabpanel" aria-labelledby="validar-tab" tabindex="0">
            <div class="container card border-0">
                <?php if (count($validar) > 0) : ?>
                    <div class="row card-header" style="background-color: white;">
                        <div class="col-md-8">
                            <h4>Descripción:</h4>
                            <p>Muestra una tabla con las noticias pendientes de validación que no han sido validadas anteriormente.</p>
                        </div>
                        <div class="col-md-4 mt-2">
                            <button onclick="infoValidar();" class="btn confirmacion"><i class="fa-solid fa-info"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
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
                                        <td><?= strlen($valid['noticia']['titulo']) > 36 ? substr($valid['noticia']['titulo'], 0, 36) . '...' : $valid['noticia']['titulo']; ?></td>
                                        <td><?= strlen($valid['noticia']['descripcion']) > 36 ? substr($valid['noticia']['descripcion'], 0, 36) . '...' : $valid['noticia']['descripcion']; ?></td>
                                        <td><?= $valid['noticia']['categorias']; ?></td>
                                        <td>
                                            <a href="<?= base_url('noticias/' . $valid['noticia']['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-eye"></i></a>
                                            <button onclick="modalPublicar('<?= base_url('noticias/publicar/' . $valid['noticia']['id']); ?>', <?= $valid['noticia']['version'] ?>);" class="btn confirmacion"><i class="fa-regular fa-square-plus"></i></button>
                                            <button onclick="modalCorregir('<?= base_url('noticias/corregir/' . $valid['noticia']['id']); ?>', <?= $valid['noticia']['version'] ?>);" class="btn confirmacion"><i class="fas fa-pencil-alt"></i></button>
                                            <?php if ($valid['seguimientos'] === false) : ?>
                                                <button onclick="modalRechazar('<?= base_url('noticias/rechazar/' . $valid['noticia']['id']); ?>', <?= $valid['noticia']['version'] ?>);" class="btn confirmacion"><i class="fa-solid fa-square-xmark"></i></button>
                                            <?php endif; ?>
                                            <button onclick="infoPage();" class="btn confirmacion"><i class="fa-solid fa-info"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <div class="card border-0 mt-5">
                        <h1 class="display-4">¡Bienvenido! Aún no hay noticias para validar.</h1>
                        <p class="lead">En esta sección, encontrarás una tabla con las noticias que requieren validación. Asegúrate de revisarlas detenidamente y realizar la acción que creas necesaria.</p>
                        <hr class="my-4">
                        <p>Utilizamos clases de utilidad para la tipografía y el espaciado, creando un diseño atractivo para destacar las propiedades disponibles.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="tab-pane" id="historial" role="tabpanel" aria-labelledby="historial-tab" tabindex="0">
            <div class="container card border-0">
                <?php if (count($seguimientos) > 0) : ?>
                    <div class="row card-header" style="background-color: white;">
                        <div class="col-md-8">
                            <h4>Descripción:</h4>
                            <p>Muestra un historial de validación del usuario, mostrando solo la última validación realizada para cada noticia.</p>
                        </div>
                        <div class="col-md-4 mt-2">
                            <button onclick="infoHistorial();" class="btn confirmacion"><i class="fa-solid fa-info"></i></button>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered mt-3 text-center" aria-describedby="titulo">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">Acción</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($seguimientos as $seguimiento) : ?>
                                <tr>
                                    <td><?= strlen($seguimiento['noticiaT']) > 36 ? substr($seguimiento['noticiaT'], 0, 36) . '...' : $seguimiento['noticiaT']; ?></td>
                                    <td><?php switch ($seguimiento['accion']) {
                                            case 1:
                                                echo 'Rechazo';
                                                break;
                                            case 2:
                                                echo 'Válido/público';
                                                break;
                                            case 3:
                                                echo 'Deshizo';
                                                break;
                                            case 4:
                                                echo 'Envio a corregir';
                                                break;
                                        } ?></td>
                                    <td><?= strlen($seguimiento['motivo']) > 36 ? substr($seguimiento['motivo'], 0, 36) . '...' : $seguimiento['motivo'];  ?></td>
                                    <td><?= $seguimiento['fechaCreacion']; ?></td>
                                    <td>
                                        <a href="<?= base_url('noticias/' . $seguimiento['noticiaI']); ?>" class="btn confirmacion"><i class="fa-solid fa-eye"></i></a>
                                        <?php if (intval($seguimiento['estado']) !== BORRADOR && intval($seguimiento['estado']) !== L_VALIDAR && $seguimiento['publicacion'] === null) : ?>
                                            <button onclick="modalDeshacer('<?= base_url('noticias/deshacer/' . $seguimiento['noticiaI']); ?>', <?= $seguimiento['version'] ?>);" class="btn confirmacion"><i class="fa-solid fa-rotate-left"></i></button>
                                        <?php endif; ?>
                                        <a href="<?= base_url('noticias/seguimientos/' . $seguimiento['noticiaI']); ?>" class="btn confirmacion"><i class="fa-solid fa-table-list"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                <?php else : ?>
                    <div class="card border-0 mt-5">
                        <h1 class="display-4">¡Bienvenido! Aún no has realizado ninguna validación.</h1>
                        <p class="lead">Aquí podrás consultar el historial de validación de la noticias, visualizando únicamente la última validación realizada por cada noticia. Utiliza esta sección para hacer un seguimiento de tus acciones de validación. Puedes ver el historial completo si asi lo necesitas</p>
                        <hr class="my-4">
                        <p>Utilizamos clases de utilidad para la tipografía y el espaciado, creando un diseño atractivo para destacar las propiedades disponibles.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-pane" id="sValidar" role="tabpanel" aria-labelledby="sValidar-tab" tabindex="0">
            <div class="container card border-0">
                <?php if (count($sinValidar) > 0) : ?>
                    <div class="row card-header" style="background-color: white;">
                        <div class="col-md-8">
                            <h4>Descripción:</h4>
                            <p>Muestra una tabla con las noticias que se publicaron automáticamente sin pasar por el proceso de validación.</p>
                        </div>
                        <div class="col-md-4 mt-2">
                            <button onclick="infoSinValidar();" class="btn confirmacion"><i class="fa-solid fa-info"></i></button>
                        </div>
                    </div>
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
                                        <a href="<?= base_url('noticias/' . $sValid['id']); ?>" class="btn confirmacion"><i class="fa-solid fa-eye"></i></a>
                                        <button onclick="modalDespublicar('<?= base_url('noticias/despublicar/' . $sValid['id']); ?>', <?= $sValid['version'] ?>);" class="btn confirmacion"><i class="fa-solid fa-rotate-left"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="card border-0 mt-5">
                        <h1 class="display-4">¡Bienvenido! Aún no hay publicaciones sin validar.</h1>
                        <p class="lead">En esta pestaña, se presentan las noticias que se publicaron automáticamente sin ser validadas previamente. Revisa con atención estas noticias y considera si requieren validación retrospectiva.</p>
                        <hr class="my-4">
                        <p>Utilizamos clases de utilidad para la tipografía y el espaciado, creando un diseño atractivo para destacar las propiedades disponibles.</p>
                    </div>
                <?php endif; ?>
            </div>
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

    const modalPublicar = (url, version) => {
        Modal.confirm({
            confirm: true,
            title: '¿Desea publicar la noticia?',
            content: `Se subira la noticia a la página principal del sitio
            <form id="form-publicar" action="${url}" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="version" value="${version}" />
                <input type="hidden" name="_method" value="PUT" />
            </form>
        `,
            onAccept: () => {
                document.getElementById("form-publicar").submit()
            }
        })
    }

    const modalRechazar = (url, version) => {
        Modal.warning({
            confirm: true,
            title: '¿Desea rechazar la noticia?',
            content: `siempre puede deshacer está descisión en la pestaña de historial
            <form id="form-rechazar" action="${url}" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="version" value="${version}" />
                <input type="hidden" name="_method" value="PUT" />
                <div class="mb-3">
                <?php $motivo = set_value("motivo"); ?>
                <?php echo form_label('Motivo', 'motivo', ['class' => 'form-label col-sm-2']); ?>
                <?php echo form_input('motivo', "$motivo", ['id' => 'motivo', 'placeholder' => 'Motivo del rechazo', 'class' => 'form-control', 'required' => true]); ?>
                <?php if (validation_show_error('motivo')) : ?>
                    <div class="alert alert-danger">
                        <?php echo validation_show_error('motivo'); ?>
                    </div>
                <?php endif; ?>
                <div type"hidden" id="errores"></div>
            </div>
            </form>
        `,
            onAccept: (e) => {
                const motivo = document.getElementById('motivo').value
                console.log(motivo)
                if (motivo !== '') {
                    document.getElementById("form-rechazar").submit()
                } else {
                    const divError = document.getElementById('errores')
                    divError.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        <strong>El campo motivo es obligatorio</strong>
                    </div>
                    `
                    e.stopPropagation();
                }

            }
        })
    }

    const modalCorregir = (url, version) => {
        Modal.confirm({
            confirm: true,
            title: '¿Desea mandar a corregir la noticia?',
            content: `siempre puede deshacer está descisión en la pestaña de historial
            <form id="form-corregir" action="${url}" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="version" value="${version}" />
                <input type="hidden" name="_method" value="PUT" />
                <div class="mb-3">
                <?php $motivo = set_value("motivo"); ?>
                <?php echo form_label('Motivo', 'motivo', ['class' => 'form-label col-sm-2']); ?>
                <?php echo form_input('motivo', "$motivo", ['id' => 'motivo', 'placeholder' => 'Motivo de la corrección', 'class' => 'form-control', 'required' => true]); ?>
                <?php if (validation_show_error('motivo')) : ?>
                    <div class="alert alert-danger">
                        <?php echo validation_show_error('motivo'); ?>
                    </div>
                <?php endif; ?>
                <div type"hidden" id="errores"></div>
            </div>
            </form>
        `,
            onAccept: (e) => {
                const motivo = document.getElementById('motivo').value
                console.log(motivo)
                if (motivo !== '') {
                    document.getElementById("form-corregir").submit()
                } else {
                    const divError = document.getElementById('errores')
                    divError.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        <strong>El campo motivo es obligatorio</strong>
                    </div>
                    `
                    e.stopPropagation();
                }

            }
        })
    }

    const modalDeshacer = (url, version) => {
        Modal.warning({
            confirm: true,
            title: '¿Desea deshacer la validación hecha?',
            content: `Siempre puede volver a revertir está desición
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

    const modalDespublicar = (url, version) => {
        Modal.warning({
            confirm: true,
            title: '¿Desea deshacer la publicación?',
            content: `Siempre puede volver a revertir está desición
            <form id="form-despublicar" action="${url}" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="version" value="${version}" />
                <input type="hidden" name="_method" value="PUT" />
            </form>
        `,
            onAccept: () => {
                document.getElementById("form-despublicar").submit()
            }
        })
    }

    const infoValidar = () => {
        Modal.confirm({
            confirm: false,
            title: '<h1 class="display-6">Ayuda sobre las validaciones</h1>',
            content: `
            <p class="lead">En esta sección, encontrarás una tabla con las noticias que requieren validación. Asegúrate de revisarlas detenidamente y realizar la acción que creas necesaria.</p>
            `
        })
    }

    const infoHistorial = () => {
        Modal.confirm({
            confirm: false,
            title: '<h1 class="display-6">Ayuda sobre el historial</h1>',
            content: `
            <p class="lead">Aquí podrás consultar el historial de validación de la noticias, visualizando únicamente la última validación realizada por cada noticia. Utiliza esta sección para hacer un seguimiento de tus acciones de validación. Puedes ver el historial completo si asi lo necesitas</p>
            `
        })
    }

    const infoSinValidar = () => {
        Modal.confirm({
            confirm: false,
            title: '<h1 class="display-6">Ayuda sobre las publicaciones sin validar</h1>',
            content: `
            <p class="lead">En esta pestaña, se presentan las noticias que se publicaron automáticamente sin ser validadas previamente. Revisa con atención estas noticias y considera si requieren validación retrospectiva.</p>
            `
        })
    }

    const info = () => {
        Modal.confirm({
            confirm: false,
            title: '<h1 class="display-6">Ayuda sobre la recarga de página</h1>',
            content: `
            <p class="lead">Siempre puede recargar la pagina para poder actualizar las tablas de ser necesario.</p>
            `
        })
    }



    function reloadPage() {
        location.reload();
    }
</script>

<?= $this->endSection(); ?>