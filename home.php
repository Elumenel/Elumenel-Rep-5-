<?php include 's_check.php' ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/24e4d2a0d1.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="backstyles.css">

    <title>Novedades</title>
  </head>

  <body>
    <nav>
      <?php include 'navs.php'; ?>
    </nav>

    <main>
      <?php
      $dia = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
      $mes = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
      ?>

      <div class="container main-container">
        <div class="table-header row justify-content-center">
          <h1 class="mb-4 text-center">Novedades</h1>
          <h2 class="mb-4 text-center"><?php echo $dia[date('w')]." ".date('d')." de ".$mes[date('n')-1]." de ".date('Y'); ?>
          </h2>
        </div>

        <div class="container">
          <!-- Start Confirmation Banner -->
          <div class="thank-you">
            <?php
            if (isset($_GET['status'])) { ?>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Novedad guardada</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } ?>
          </div>
        </div>
        <!-- End Confirmation Banner -->

        <!-- Start Call-to-Action -->
        <div class="add-new">
          <div class="call-to-action">
            <a data-bs-toggle="collapse" href="#agregar-novedad" role="button" aria-expanded="false" aria-controls="agregar-novedad">
              <i class="fa-solid fa-circle-plus" id="click-me"> Agregar</i>
              <script type="text/javascript">
                document.getElementById("click-me").onclick = function(){
                  document.getElementById("click-me").style.display="none";
                }
              </script>
            </a>
          </div>
        <!-- End Call-to-Action -->

        <!-- Start Embedded Form -->
        <div class="collapse" id="agregar-novedad">
          <div class="collapsible-form">
            <div class="embedded-form">
              <?php include 'pag_nnovedad.php' ?>
            </div>
          </div>
        </div>
        <!-- End Embedded Form -->
      </div>

      <!-- Start Corkboard -->
      <div class="container corkboard">
        <ul>
          <?php
          $archivo = fopen('novedades.txt', 'r');

          if ($archivo) {
            while (!feof($archivo)) { ?>
              <li class="post-it">
                <p class="note-date"><i class="fa-solid fa-calendar-days"></i><?php echo " ".fgets($archivo); ?></p>
                <p class="note-content"><?php echo fgets($archivo); ?></p>
                <p class="note-content"><?php echo fgets($archivo); ?></p>
                <p class="note-content"><?php echo fgets($archivo); ?></p>
                <p hidden><?php fgets($archivo); ?></p>
              </li><?php
            }
          }
          fclose($archivo); ?>
        </ul>
      </div>
      <!--End Corkboard-->
    </main>

    <footer>
      <?php include "footer.php" ?>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
