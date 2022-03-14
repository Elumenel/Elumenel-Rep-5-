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

    <title>Panel de control</title>
  </head>

  <body>
    <nav>
      <?php include 'navs.php'; ?>
    </nav>

    <main>
      <?php include 'db_consulta_producto_exp.php';
      $fila = mysqli_fetch_assoc($resultado);
      $categorias1_array = explode('|', $fila['categorias1']);
      $categorias2_array = explode('|', $fila['categorias2']);
      ?>

      <div class="container main-container">
        <div class="table-header row justify-content-center">
          <h1 class="mb-4 text-center">Productos</h1>
          <h2 class="mb-4 text-center">Producto #<?php echo $fila['id_producto']?>: <?php echo $fila['titulo']; ?></h2>
        </div>

        <!--Start Form-->
        <div class="container form-container" id="nproduct-container">
          <form class="row g-4 readonly-form">
            <div class="col-12">
              <h4>Datos de la Imagen</h4>
            </div>

            <div class="col-9">
              <label class="form-label">Título de la Fotografía</label>
              <input type="text" class="form-control" name="titulo" value="<?php echo $fila['titulo']; ?>" readonly>
            </div>

            <div class="col-3">
              <label class="form-label">Fecha de la Toma</label>
              <input type="month" class="form-control" name="fecha" value="<?php echo date('Y', strtotime($fila['fecha_toma'])).'-'.date('m', strtotime($fila['fecha_toma'])); ?>" readonly>
            </div>

            <div class="col-3">
              <label class="form-label">Lugar</span></label>
              <input type="text" class="form-control" name="lugar" value="<?php echo $fila['lugar']; ?>" readonly>
            </div>

            <div class="col-3">
              <label class="form-label"><span class="location">País</span></label>
              <input type="text" class="form-control" name="pais" value="<?php echo $fila['pais']; ?>" readonly>
            </div>

            <div class="col photo-readonly">
              <label for="formFile" class="form-label">Imagen de Referencia</label>
              <div class="exp-photo">
                <img class="image photo-img" id="modal-trigger" src="img/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['lugar']; ?>">
                <div id="imgHelp" class="form-text"><?php echo $fila['imagen']; ?></div>
              </div>
            </div>

            <div class="modal" id="photoModal">
              <i class="fa-solid fa-circle-xmark close-modal"></i>
              <img class="modal-content" src="img/<?php echo $fila['imagen']; ?>">
            </div>

            <div class="col-12">
              <h4>Categorías</h4>
            </div>

            <div class="col-3" id="categorias1">
              <label class="form-label">Categorías Principales</label>
              <div class="form-check" aria-label="Categorías">
                <label class="form-check-label" for="check1_1">Interior</label>
                <!-- "onclick='return false;'" funciona como workaround para que las checkboxes sean 'readonly' -->
                <input class="form-check-input" type="checkbox" name="categorias1[]" value="int" id="check1_1" <?php if (in_array('int', $categorias1_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check1_2">Paisaje Cultural</label>
                <input class="form-check-input" type="checkbox" name="categorias1[]" value="pcult" id="check1_2" <?php if (in_array('pcult', $categorias1_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categorias1[]" value="pnat" id="check1_3" <?php if (in_array('pnat', $categorias1_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
                <label class="form-check-label" for="check1_3">Paisaje Natural</label>
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check1_4">Paisaje Rural</label>
                <input class="form-check-input" type="checkbox" name="categorias1[]" value="prur" id="check1_4" <?php if (in_array('prur', $categorias1_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check1_5">Paisaje Urbano</label>
                <input class="form-check-input" type="checkbox" name="categorias1[]" value="purb" id="check1_5" <?php if (in_array('purb', $categorias1_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
              </div>
              <div class="fill-container" id="please-fill1" style="visibility: hidden">
                <div class="please-fill">
                  <span class="please-icon">!</span></i><span class="please-text">Por favor seleccione al menos una categoría.</span>
                </div>
              </div>
            </div>

            <div class="col-3" id="categorias2">
              <label class="form-label">Categorías Secundarias</label>
              <div class="form-check" aria-label="Categorías Secundarias">
                <label class="form-check-label" for="check2_1">Bosque</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="bos" id="check2_1" <?php if (in_array('bos', $categorias2_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check2_2">Desierto</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="des" id="check2_2" <?php if (in_array('des', $categorias2_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check2_3">Mar</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="mar" id="check2_3" <?php if (in_array('mar', $categorias2_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="mon" id="check2_4" <?php if (in_array('mon', $categorias2_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
                <label class="form-check-label" for="check2_4">Montaña</label>
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check2_5">Parque</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="par" id="check2_5" <?php if (in_array('par', $categorias2_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check2_6">Playa</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="pla" id="check2_6" <?php if (in_array('pla', $categorias2_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check2_7">Selva</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="sel" id="check2_7" <?php if (in_array('sel', $categorias2_array)) { echo 'checked="checked"'; } ?> onclick="return false;">
              </div>
            </div>

            <div class="col-12">
              <h4>Datos del Soporte</h4>
            </div>

            <div class="col-3">
              <label class="form-label">Formato</label>
              <input type="text" class="form-control" name="formato" value="<?php echo $fila['formato']; ?>" style = "text-transform:capitalize;" readonly>
            </div>

            <div class="col-3">
              <label class="form-label">Dimensiones</label>
              <input type="text" class="form-control" name="dimensiones" value="<?php echo $fila['dimensiones'].'cm'; ?>" readonly>
            </div>

            <div class="col-12">
              <h4>Información Comercial</h4>
            </div>

            <div class="col-3">
              <label class="form-label">Stock</label>
              <input type="number" class="form-control" aria-label="Stock Inicial" name="stock" value="<?php echo $fila['stock']; ?>" readonly>
            </div>
            <div class="col-3">

              <label class="form-label">Precio de Venta</label>
              <div class="currency-input"><span>$</span><input type="number" class="form-control" aria-label="Precio" name="precio" value="<?php echo $fila['precio']; ?>" required></div>
            </div>

            <div class="col-3 status-radio">
              <label class="form-label">Estado de la Publicación</label>
              <div class="form-check form-check-inline" aria-label="Estado">
                <input class="form-check-input" type="radio" name="estado" value="1" id="estado_a" <?php if ($fila['estado']==1) { echo 'checked="checked"'; } ?> onclick="return false;">
                <label class="form-check-label" for="estado_a">Activa</label>
              </div>
              <div class="form-check form-check-inline" aria-label="Estado">
                <input class="form-check-input" type="radio" name="estado" value="0" id="estado_p" <?php if ($fila['estado']==0) { echo 'checked="checked"'; } ?> onclick="return false;">
                <label class="form-check-label" for="estado_p">Pausada</label>
              </div>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
              <a class="btn btn-primary btn-lg small-green-button" href="pag_mproducto.php?id=<?php echo $fila['id_producto']; ?>">Editar Registro</i></a>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
              <a class="btn btn-secondary btn-lg small-green-button" href="db_eliminar_productos.php?id=<?php echo $fila['id_producto']; ?>&file=img/<?php echo $fila['imagen']; ?>" onclick="return confirm('¿Está seguro que desea eliminar?')">Borrar Registro</i></a>
            </div>
          </form>
        </div>
        <!--End Form-->
      </div>
      <script type="text/javascript">
        var modal = document.getElementById("photoModal");

        var img = document.getElementById("modal-trigger");
        var modalImg = document.getElementById("modal-content");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        var span = document.getElementsByClassName("close-modal")[0];

        span.onclick = function() {
          modal.style.display = "none";
        }
      </script>
    </main>

    <footer>
      <?php include 'footer.php' ?>
    </footer>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9Ah60zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
