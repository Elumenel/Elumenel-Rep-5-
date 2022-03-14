<!doctype html>
<html lang="es">
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

    <title>Login</title>
  </head>

  <body>
    <div class="container login-container">
      <div class="container">
        <i class="fa-solid fa-id-card-clip"></i>
        <h1>Login</h1>
      </div>

      <div class="container alert-container">
        <?php
        if (isset($_GET['error_captcha'])) { ?>
          <div class="alert alert-danger alert-dismissible fade show" id="alert-captcha" role="alert">
            <strong><i class="fa-solid fa-triangle-exclamation"></i> El código captcha ingresado es incorrecto.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> <?php
        }elseif (isset($_GET['error_credenciales'])) { ?>
          <div class="alert alert-danger alert-dismissible fade show" id="alert-credentials" role="alert">
            <strong><i class="fa-solid fa-triangle-exclamation"></i> Las credenciales ingresadas son inválidas</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> <?php
        }elseif (isset($_GET['please_login'])) { ?>
          <div class="alert alert-danger alert-dismissible fade show" id="alert-credentials" role="alert">
            <strong><i class="fa-solid fa-triangle-exclamation"></i> Para ver esta página, por favor ingrese como usuario.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> <?php
        } ?>
      </div>

      <form action="s_validar.php" method="POST">
        <div class="row gy-4">
          <div class="col-12">
            <input type="text" class="form-control" name="user" placeholder="Usuario" required>
          </div>
          <div class="col-11">
            <input type="password" class="form-control" id="pw-input" name="pw" placeholder="Contraseña" required>
          </div>
          <div class="col-1">
            <i class="fa-solid fa-eye" id="showme" onclick="showPw()"></i>
          </div>
          <div class="col-7">
            <input type="text" class="form-control" name="captcha" placeholder="Código de seguridad" required>
          </div>
          <div class="col-5">
            <img src="captcha.php" alt="">
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-primary small-green-button log-me-in">Ingresar</button>
          </div>

          <script type="text/javascript">
            function showPw() {
              var input1 = document.getElementById("pw-input");
              if (input1.type === "password") {
                input1.type = "text";
              }else {
                input1.type = "password";
              }
            }
          </script>
        </div>
      </form>
    </div>

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
