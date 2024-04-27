<header>
  <div class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#0047AB;">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?= base_url('/noticias'); ?>" ><i class="fa-solid fa-earth-americas fa-2xl mt-4" style="color: #CCCCCC;"></i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse noticias-nav" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item ml-auto dropdown">
                <a class="nav-link dropdown-toggle" style="color: #CCCCCC;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user"></i> Usuario
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url('/usuarios');?>" >Iniciar Sesion</a>
                  <a class="dropdown-item" href="<?= base_url('/usuarios/new');?>" >Crear cuenta</a>
                  <a class="dropdown-item" href="<?= base_url('/usuarios/logOut');?>" >Cerrar sesion</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>