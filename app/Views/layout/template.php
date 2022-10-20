
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TLS | <?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/datatable/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="/datatable/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/css/custom.min.css">
    <link rel="stylesheet" href="/css/custom.css">
  </head>
  <body>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a href="../" class="navbar-brand">TLS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/"><i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/penduduk"><i class="fa-solid fa-file"></i> Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/prediksi"><i class="fa-solid fa-chart-simple"></i> Prediksi</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-md-auto">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"><i class="fa-solid fa-circle-user"></i> <?= user()->getUsername() ?></a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/settings">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="preloader">
        <div class="loading">
            <div class="spinner-grow text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div id="base-url" data-url="<?= base_url(); ?>"></div>
    
    <?= $this->renderSection('content'); ?>

    <footer id="footer">
        <div class="row">
          <div class="col-lg-12">
            <ul class="list-unstyled">
              <li class="float-end"><a href="#top">Back to top</a></li>
            </ul>
            <p>Made with ❤️ by <a href="#">Naufal Aziz Albaaqie</a>.</p>
          </div>
        </div>
      </footer>
    </div>
    <?= $this->include('layout/js'); ?>
    <?= $this->renderSection('js'); ?>
    
  </body>
</html>