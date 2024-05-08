<header>
  <div class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-expand-lg bg-dark" style="background-color:#0047AB;">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?= base_url('/'); ?>" ><img src="<?= base_url('/assets/icon/news.png');?>" style="border-radius: 50%; max-width: 65px;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse noticias-nav" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item ml-auto dropdown">
                <a class="nav-link dropdown-toggle" style="color: #CCCCCC;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user"></i> Multi rol
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url('/noticias/new');?>" >Crear noticia</a>
                  <a class="dropdown-item" href="<?= base_url('/noticias/home');?>" >Área de trabajo</a>
                  <a class="dropdown-item" href="<?= base_url('/noticias/validate');?>" >Área de validaciones</a>
                  <a class="dropdown-item" href="<?= base_url('/usuarios/logOut');?>" >Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>