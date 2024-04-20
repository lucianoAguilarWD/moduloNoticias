<?php echo $this->extend('layouts/layoutBase');?>

<?php echo $this->section('contenido'); ?>

<main class="container">

    <h2 class="mb-4">Nuevo producto</h2>

    <?php 
        //echo validation_list_errors();
    ?>

    <?php echo form_open('ejemplo/guarda'); ?>

    <?php 
        $atributos = [
            'type' => 'text',
            'id' => 'codigo',
            'name' => 'codigo',
            'class' => 'form-control',
            'required' => true,
            'value' => set_value("codigo", "ABC-123")
        ];

        $nombre = set_value("nombre", "pepe");
        $precio = set_value("precio", "23");
        $stock = set_value("stock", "12");
        $almacen = set_value("almacen", "1");
    ?>

    <div class= "mb-3 row">
        <?php echo form_label('Código', 'codigo', ['class' => 'form-label col-sm-2']); ?>
        <?php echo form_input($atributos); ?>
        <?php echo validation_show_error('codigo'); ?>
    </div>

    <div class= "mb-3 row">
        <?php echo form_label('Nombre', 'nombre', ['class' => 'form-label col-sm-2']); ?>
        <?php echo form_input('nombre', "$nombre" , ['id' => 'nombre', 'class' => 'form-control']); ?>
        <?php echo validation_show_error('nombre'); ?>
    </div>

    <div class= "mb-3 row">
        <?php echo form_label('Precio', 'precio', ['class' => 'form-label col-sm-2']); ?>
        <?php echo form_input('precio', "$precio", ['id' => 'precio', 'min' => 1, 'class' => 'form-control'], 'number'); ?>
        <?php echo validation_show_error('precio'); ?>
    </div>

    <div class= "mb-3 row"
        <?php echo form_label('Stock', 'stock', ['class' => 'form-label col-sm-2']); ?>
        <?php echo form_input('stock', "$stock", ['id' => 'stock', 'min' => 0, 'class' => 'form-control'], 'number'); ?>
        <?php echo validation_show_error('stock'); ?>
    </div>

    <div class= "mb-3 row"
        <?php echo form_label('Almacen', 'almacen', ['class' => 'form-label col-sm-2']); ?>
        <?php echo form_input('almacen', "$almacen", ['id' => 'almacen', 'min' => 0, 'class' => 'form-control'], 'number'); ?>
        <?php echo validation_show_error('almacen'); ?>
    </div>

    <div class= "mb-3 row">
        <?php echo form_submit('submit', 'Guardar', ['class' => 'btn btn-primary']); ?>
    </div>

    <?php echo form_close(); ?>

</main>
<?php echo $this->endSection(); ?>