<?php echo $this->extend($layout); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3" id="titulo">Noticias</h3>

<a href="<?= base_url('noticias/new'); ?>" class="btn btn-success">Agregar</a>

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col">Estado</th>
            <th scope="col">Activa</th>
            <th scope="col">Creación</th>
            <th scope="col">Usuario</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($noticias as $noticia) : ?>

            <tr>
                <td><?= $noticia['titulo']; ?></td>
                <td><?= $noticia['descripcion']; ?></td>
                <td><?= $noticia['id_categoria']; ?></td>
                <td><?= $noticia['imagen']; ?></td>
                <td><?= $noticia['estado']; ?></td>
                <td><?= $noticia['activa']; ?></td>
                <td><?= $noticia['fechaCreacion']; ?></td>
                <td><?= $noticia['id_usuario']; ?></td>
                <td>
                    <a href="<?= base_url('noticias/' . $noticia['id'] . '/edit'); ?>" class="btn btn-warning btn-sm me-2">Editar</a>

                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-url="<?= base_url('noticias/' . $noticia['id']); ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <form id="form-elimina" action="" method="post">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<script>
    const eliminaModal = document.getElementById('eliminaModal')
    if (eliminaModal) {
        eliminaModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const url = button.getAttribute('data-bs-url')

            // Update the modal's content.
            const form = eliminaModal.querySelector('#form-elimina')
            form.setAttribute('action', url)
        })
    }
</script>

<?= $this->endSection(); ?>