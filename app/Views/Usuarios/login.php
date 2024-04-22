<?php echo $this->extend('layouts/layoutUsuarios'); ?>

<?php echo $this->section('contenido'); ?>
<div class="container mt-5 ">
    <br><br>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Crear Usuario</h3>
        </div>
        <div class="card-body">
            <?php echo form_open('Usuarios/login'); ?>

            <?php
            $nombreAt = [
                'type' => 'text',
                'id' => 'nombre',
                'name' => 'nombre',
                'class' => 'form-control',
                'required' => true,
                'value' => set_value("nombre", "Nombre de usuario")
            ];

            $contraseniaAt = [
                'type' => 'text',
                'id' => 'pw',
                'name' => 'pw',
                'class' => 'form-control',
                'required' => true,
                'value' => set_value("pw", "Introduce tu contraseña")
            ];

            ?>

            <div class="mb-3 row">
                <?php echo form_label('Usuario', 'nombre', ['class' => 'form-label col']); ?>
                <?php echo form_input($nombreAt); ?>
                <?php echo validation_show_error('nombre'); ?>
            </div>

            <div class="mb-3 row">
                <?php echo form_label('Contraseña', 'pw', ['class' => 'form-label col']); ?>
                <?php echo form_input($contraseniaAt); ?>
                <?php echo validation_show_error('pw'); ?>
            </div>

            <div class="mb-3 row">
                <?php echo form_submit('submit', 'Iniciar Sesión', ['class' => 'btn btn-primary']); ?>
            </div>

            <?php echo form_close(); ?>
        </div>
        <div class="card-footer text-muted">
            ¿No tienes una cuenta? <a href="new">Regístrate aquí</a>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>