<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="container mt-5">
    <br><br>
    <div class="container card">
        <div class="card-header" style="background-color:white;">
            <h3 class="text-center">Crear Usuario</h3>
        </div>
        <div class="card-body">
            <?php echo form_open('usuarios/create'); ?>

            <?php
            //? atributos de los input
            
            $nombreAt = [
                'type' => 'text',
                'id' => 'nombre',
                'name' => 'nombre',
                'class' => 'form-control',
                //'required' => true,
                'placeholder' => 'Ingrese un nombre de usuario',
                'value' => set_value('nombre')
            ];

            $contraseniaAt = [
                'type' => 'password',
                'id' => 'pw',
                'name' => 'pw',
                'class' => 'form-control',
                //'required' => true,
                'placeholder' => 'Introduce una contraseña',
                'value' => set_value('pw')
            ];

            $contraseniaconfAt = [
                'type' => 'password',
                'id' => 'pwc',
                'name' => 'pwc',
                'class' => 'form-control',
                //'required' => true,
                'placeholder' => "Confirmar la contraseña",
            ];

            $options = array(
                0  => 'Editor',
                1    => 'Validador',
                2   => 'Ambos',
            );


            ?>

            <div class="mb-3">
                <?php echo form_label('Usuario', 'nombre', ['class' => 'form-label col']); ?>
                <?php echo form_input($nombreAt); ?>
                <?php if (validation_show_error('nombre')) : ?>
                    <div class="alert alert-danger">
                        <?php echo validation_show_error('nombre'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <?php echo form_label('Seleccione un rol', 'rol', ['class' => 'form-label col']); ?>
                <?php echo form_dropdown('rol', $options, '0'); ?>
                <?php if (validation_show_error('rol')) : ?>
                <div class="alert alert-danger">
                    <?php echo validation_show_error('rol'); ?>
                </div>
                <?php endif; ?>
            </div>


            <div class="mb-3">
                <?php echo form_label('Contraseña', 'pw', ['class' => 'form-label col']); ?>
                <?php echo form_input($contraseniaAt); ?>
                <?php if (validation_show_error('pw')) : ?>
                <div class="alert alert-danger">
                    <?php echo validation_show_error('pw'); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <?php echo form_label('Confirmar Contraseña', 'pwc', ['class' => 'form-label col']); ?>
                <?php echo form_input($contraseniaconfAt); ?>
                <?php if (validation_show_error('pwc')) : ?>
                <div class="alert alert-danger">
                    <?php echo validation_show_error('pwc'); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <?php echo form_submit('submit', 'Crear Cuenta', ['class' => 'btn confirmacion']); ?>
                <a href="<?= base_url('/'); ?>" class="btn confirmacion" >Volver a inicio</a>
            </div>

            <?php echo form_close(); ?>
        </div>
        <div class="card-footer text-muted" style="background-color:white;">
            ¿Ya tienes una cuenta? <a href="<?= base_url('usuarios'); ?>">Inicia sesión aquí</a>
        </div>
    </div>
</main>

<?php echo $this->endSection(); ?>