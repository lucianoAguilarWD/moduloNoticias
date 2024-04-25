<?php echo $this->extend($layout); ?>

<?php echo $this->section('contenido'); ?>

<main class="container mt-5">
    <br><br>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Iniciar Sesión</h3>
        </div>
        <div class="card-body">
            <?php echo form_open('usuarios/login'); ?>

            <?php
            //? atributos de los input

            $nombreAt = [
                'type' => 'text',
                'id' => 'nombre',
                'name' => 'nombre',
                'class' => 'form-control',
                //'required' => true,
                'placeholder' => 'Introduce tu usuario',
                'value' => set_value('nombre')
            ];

            $contraseniaAt = [
                'type' => 'password',
                'id' => 'pw',
                'name' => 'pw',
                'class' => 'form-control',
                //'required' => true,
                'placeholder' => "Introduce tu contraseña"
            ];

            ?>

            <div class="mb-3">
                <?php echo form_label('Usuario', 'nombre', ['class' => 'form-label col']); ?>
                <?php echo form_input($nombreAt); ?>
            </div>

            <div class="mb-3">
                <?php echo form_label('Contraseña', 'pw', ['class' => 'form-label col']); ?>
                <?php echo form_input($contraseniaAt); ?>
            </div>

            <div class="mb-3">
                <?php echo form_submit('submit', 'Iniciar Sesión', ['class' => 'btn confirmacion']); ?>
                <a href="<?= base_url('/'); ?>" class="btn confirmacion" >Volver a inicio</a>
            </div>

            <?php echo form_close(); ?>

            <?php
            //? mensajes de error

            // $usuarioNoEncontrado = session()->getFlashdata('Error:0');
            // $pwIncorrecta = session()->getFlashdata('Error:1');
            if ( validation_show_error('nombre') || validation_show_error('pw')) : ?>
                <div class="alert alert-danger">
                    <?php
                    echo "<p>".validation_show_error('nombre')."</p>";
                    echo "<p>".validation_show_error('pw')."</p>";
                    // echo "<p>".$usuarioNoEncontrado."</p>";
                    // echo "<p>".$pwIncorrecta."</p>";
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="card-footer text-muted">
            ¿No tienes una cuenta? <a href="<?= base_url('usuarios/new'); ?>">Regístrate aquí</a>
        </div>
    </div>
</main>

<?php echo $this->endSection(); ?>