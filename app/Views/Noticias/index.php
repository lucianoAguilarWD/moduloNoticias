<?php echo $this->extend($layout); ?>

<?= $this->section('contenido'); ?>

<main class="container-fluid">
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
                        <a href="<?= base_url('noticias/' . $noticia['id']); ?>" class="btn btn-warning btn-sm me-2"> Mostrar</a>

                        <button onclick="modalConfirmacion('<?= base_url('noticias/' . $noticia['id']); ?>');" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</main>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<script>
    const modalConfirmacion = (url) => {
        Modal.danger({
            confirm: true,
            title: '¿Desea Eliminar la noticia?',
            content: `Si elimina la noticia no podra recuperarla luego.
                <form id="form-elimina" action="${url}" method="post">
                    <input type="hidden" name="_method" value="DELETE" />
                </form>
            `,
            onAccept: () => {
                document.getElementById("form-elimina").submit()
            }
        })
    }
</script>

<?= $this->endSection(); ?>