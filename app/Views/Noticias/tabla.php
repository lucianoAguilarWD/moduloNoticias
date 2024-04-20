<?php echo $this->extend('layouts/layoutBase');?>

<?php echo $this->section('contenido'); ?>

<main class="container mt-5">
  <br><br><br>
  <div class="card">
    <div class="card-header">
      <h3 class="text-center">Productos</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Código</th>
              <th scope="col">Nombre</th>
              <th scope="col">Stock</th>
            </tr>
          </thead>
          <tbody id="tablaUsuarios">
            <?php foreach($productos as $producto) :?>
              <tr>
                <td><?php echo $producto['codigo'] ?></td>
                <td><?php echo $producto['nombre'] ?></td>
                <td><?php echo $producto['stock'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer text-muted"></div>
  </div>
  <div class="container" id="errorContainer"></div>
</main>
<?php echo $this->endSection(); ?>