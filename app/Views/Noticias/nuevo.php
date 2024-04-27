<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="container">

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="text-center">Nueva noticia</h3>
        </div>
        <div class="card-body g-3 mt-3">
            <?php echo form_open_multipart('noticias/create'); ?>

            <?php
            $titulo = [
                'type' => 'text',
                'id' => 'titulo',
                'name' => 'titulo',
                'class' => 'form-control',
                'value' => set_value('titulo'),
                'placeholder' => 'Titulo de la noticia'
            ];

            $desc = [
                'type' => 'text',
                'id' => 'desc',
                'name' => 'desc',
                'class' => 'form-control',
                'value' => set_value('desc'),
                'placeholder' => 'Descripción de la noticia'
            ];

            $categoriasOpcion = [];
            foreach ($categorias as $categoria) {
                $categoriasOpcion[$categoria['id']] = $categoria['nombre'];
            }

            ?>

            <div class="mb-3">
                <?php echo form_label('Titulo', 'titulo', ['class' => 'form-label col-sm-2']); ?>
                <?php echo form_input($titulo); ?>
                <?php if (validation_show_error('titulo')) : ?>
                    <div class="alert alert-danger">
                        <?php echo validation_show_error('titulo'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <?php echo form_label('Descripción', 'desc', ['class' => 'form-label col-sm-2']); ?>
                <?php echo form_input($desc); ?>
                <?php if (validation_show_error('desc')) : ?>
                    <div class="alert alert-danger">
                        <?php echo validation_show_error('desc'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <?php echo form_label('Seleccione una categoria', 'categoria', ['class' => 'form-label col']); ?>
                <?php echo form_dropdown('categoria', $categoriasOpcion, '0'); ?>
                <?php if (validation_show_error('categoria')) : ?>
                    <div class="alert alert-danger">
                        <?php echo validation_show_error('categoria'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="archivo">Selecciona una imagen(opcional)</label>
                <input type="file" name="archivo" id="archivo" accept="image/jpeg, image/png">
                <?php if (validation_show_error('archivo')) : ?>
                    <div class="alert alert-danger">
                        <?php echo validation_show_error('archivo'); ?>
                    </div>
                <?php endif; ?>
            </div>


            <div class="mb-3">
                <?php echo form_submit('submit', 'Enviar para validar', ['class' => 'btn confirmacion']); ?>
            </div>

            <?php echo form_close(); ?>
        </div>
        <div class="card-footer"></div>
    </div>

</main>
<?php echo $this->endSection(); ?>