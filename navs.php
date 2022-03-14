<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="backstyles.css">

    <title></title>
  </head>

  <body>
    <nav>
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" id="navbar-container">
        <div class="container-fluid">
          <div class="collapse navbar-collapse justify-content-end" id="navbar-text">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="far fa-bell"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-envelope"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="s_cerrar.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </nav>

    <main>
      <div class="sidebar-container">
        <div class="accordion">
          <div class="sidebar-accordion">
            <div class="label label-1">
              <a href="home.php">
                <i class="fa-solid fa-house-chimney nav-icon"></i>
                <span class="nav-text">Inicio</span>
              </a>
            </div>
          </div>

          <div class="sidebar-accordion">
            <div class="label">
              <i class="fa-solid fa-person-dots-from-line nav-icon"></i>
              <span class="nav-text">Clientes <i class="fas fa-chevron-down"></i></span>
            </div>
            <ul class="sidebar-nav">
              <li><a href="#">Agregar Clientes</a></li>
              <li><a href="#">Elenco de Clientes</a></li>
            </ul>
          </div>

          <div class="sidebar-accordion">
            <div class="label">
              <i class="fa-solid fa-cart-flatbed nav-icon"></i>
              <span class="nav-text">Productos <i class="fas fa-chevron-down"></i></span>
            </div>
            <ul class="sidebar-nav">
              <li><a href="pag_nproducto.php">Agregar Productos</a></li>
              <li><a href="pag_inventario.php">Inventario</a></li>
            </ul>
          </div>

          <div class="sidebar-accordion">
            <div class="label">
              <i class="fa-solid fa-truck nav-icon"></i>
              <span class="nav-text">Ventas <i class="fas fa-chevron-down"></i></span>
            </div>
            <ul class="sidebar-nav">
              <li><a href="#">Procesar Pedidos</a></li>
              <li><a href="#">Histórico Ventas</a></li>
            </ul>
          </div>

          <script type="text/javascript">
          const accordion = document.getElementsByClassName('sidebar-accordion');
          for (i=0; i<accordion.length; i++) {
            accordion[i].addEventListener('click', function() {
              this.classList.toggle('active')
            })
          }
          </script>
        </div>
      </div>
    </main>
  </body>
</html>
