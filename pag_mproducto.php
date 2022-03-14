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
          <h2 class="mb-4 text-center">Editar Producto #<?php echo $fila['id_producto'];?></h2>
        </div>

        <!--Start Form-->
        <div class="container form-container">
          <form class="row g-4" action="db_modificar_producto.php" method="POST" enctype="multipart/form-data">
            <div class="col-12">
              <h4>Datos de la Imagen</h4>
            </div>

            <div class="col-9">
              <label class="form-label">Título de la Fotografía</label>
              <input type="text" class="form-control" maxlength="40" name="titulo" value="<?php echo $fila['titulo']; ?>" required>
            </div>

            <div class="col-3">
              <label class="form-label">Fecha de la Toma</label>
              <input type="month" class="form-control" name="fecha" value="<?php echo date('Y', strtotime($fila['fecha_toma'])).'-'.date('m', strtotime($fila['fecha_toma'])); ?>" required>
            </div>

            <div class="col-3">
              <label class="form-label">Lugar</span></label>
              <input type="text" class="form-control" maxlength="40" name="lugar" value="<?php echo $fila['lugar']; ?>" required>
            </div>

            <div class="col-3">
              <label class="form-label"><span class="location">País</span></label>
              <select class="form-select" aria-label="País" name="pais" required>
                <option value="Alemania" <?php if ($fila['pais'] == "Alemania") { echo "selected"; } ?>>Alemania</option>
                <option value="Egipto" <?php if ($fila['pais'] == "Egipto") { echo "selected"; } ?>>Egipto</option>
                <option value="Francia" <?php if ($fila['pais'] == "Francia") { echo "selected"; } ?>>Francia</option>
                <option value="Italia" <?php if ($fila['pais'] == "Italia") { echo "selected"; } ?>>Italia</option>
                <option value="Inglaterra" <?php if ($fila['pais'] == "Inglaterra") { echo "selected"; } ?>>Inglaterra</option>
                <option value="República Checa" <?php if ($fila['pais'] == "República Checa") { echo "selected"; } ?>>República Checa</option>
                <option value="Rumania" <?php if ($fila['pais'] == "Rumania") { echo "selected"; } ?>>Rumania</option>
                <option value="Rusia" <?php if ($fila['pais'] == "Rusia") { echo "selected"; } ?>>Rusia</option>
              </select>
            </div>

            <div class="col-2">
              <label for="formFile" class="form-label">Imagen de Referencia</label>
              <div class="sm-photo" id="sm-photo">
                <img class="image photo-img" src="img/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['lugar']; ?>">
                <!-- Start Call to Action -->
                <div class="call-to-action" id="add-pic">
                  <a data-bs-toggle="collapse" href="#mod-foto" role="button" aria-expanded="false" aria-controls="agregar-foto">
                    <i class="fa-solid fa-pen" id="click-me"> Cambiar foto</i>
                    <script type="text/javascript">
                      document.getElementById("click-me").onclick = function() {
                        document.getElementById("sm-photo").style.display="none";
                      }
                    </script>
                  </a>
                </div>
                <!-- End Call to Action -->
              </div>
            </div>

            <div class="col-2">
              <div class="collapse" id="mod-foto">
                <span class="mytooltip" id="displaced-tooltip" data-text="Utilizar un nombre de archivo descriptivo, breve y sin espacios." ><i class="fa-solid fa-circle-question"></i></span>
                <input class="form-control" type="file" id="formFile" name="img_file">
              </div>
            </div>

            <div class="col-12">
              <h4>Categorías</h4>
            </div>

            <div class="col-3" id="categorias1">
              <label class="form-label">Categorías Principales</label>
              <div class="form-check" aria-label="Categorías">
                <label class="form-check-label" for="check1_1">Interior</label>
                <input class="form-check-input" type="checkbox" name="categorias1[]" value="int" id="check1_1" <?php if (in_array('int', $categorias1_array)) { echo 'checked="checked"'; } ?>>
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check1_2">Paisaje Cultural</label>
                <input class="form-check-input" type="checkbox" name="categorias1[]" value="pcult" id="check1_2" <?php if (in_array('pcult', $categorias1_array)) { echo 'checked="checked"'; } ?>>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categorias1[]" value="pnat" id="check1_3" <?php if (in_array('pnat', $categorias1_array)) { echo 'checked="checked"'; } ?>>
                <label class="form-check-label" for="check1_3">Paisaje Natural</label>
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check1_4">Paisaje Rural</label>
                <input class="form-check-input" type="checkbox" name="categorias1[]" value="prur" id="check1_4" <?php if (in_array('prur', $categorias1_array)) { echo 'checked="checked"'; } ?>>
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check1_5">Paisaje Urbano</label>
                <input class="form-check-input" type="checkbox" name="categorias1[]" value="purb" id="check1_5" <?php if (in_array('purb', $categorias1_array)) { echo 'checked="checked"'; } ?>>
              </div>
              <div class="fill-container" id="please-fill1" style="visibility: hidden">
                <div class="please-fill">
                  <span class="please-icon">!</span></i><span class="please-text">Por favor seleccione al menos una categoría.</span>
                </div>
              </div>
            </div>

            <div class="col-4" id="categorias2">
              <label class="form-label">Categorías Secundarias</label>
              <div class="form-check" aria-label="Categorías Secundarias">
                <label class="form-check-label" for="check2_1">Bosque</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="bos" id="check2_1" <?php if (in_array('bos', $categorias2_array)) { echo 'checked="checked"'; } ?>>
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check2_2">Desierto</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="des" id="check2_2" <?php if (in_array('des', $categorias2_array)) { echo 'checked="checked"'; } ?>>
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check2_3">Mar</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="mar" id="check2_3" <?php if (in_array('mar', $categorias2_array)) { echo 'checked="checked"'; } ?>>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="mon" id="check2_4" <?php if (in_array('mon', $categorias2_array)) { echo 'checked="checked"'; } ?>>
                <label class="form-check-label" for="check2_4">Montaña</label>
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check2_5">Parque</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="par" id="check2_5" <?php if (in_array('par', $categorias2_array)) { echo 'checked="checked"'; } ?>>
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check2_6">Playa</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="pla" id="check2_6" <?php if (in_array('pla', $categorias2_array)) { echo 'checked="checked"'; } ?>>
              </div>
              <div class="form-check">
                <label class="form-check-label" for="check2_7">Selva</label>
                <input class="form-check-input" type="checkbox" name="categorias2[]" value="sel" id="check2_7" <?php if (in_array('sel', $categorias2_array)) { echo 'checked="checked"'; } ?>>
              </div>
            </div>

            <div class="col-12">
              <h4>Datos del Soporte</h4>
            </div>

            <div class="col-3">
              <label class="form-label">Formato</label>
              <select class="form-select" aria-label="Formato" name="formato" required>
                <option value="horizontal" <?php if ($fila['formato'] == "horizontal") { echo "selected"; } ?>>Horizontal</option>
                <option value="vertical" <?php if ($fila['formato'] == "vertical") { echo "selected"; } ?>>Vertical</option>
                <option value="cuadrado" <?php if ($fila['formato'] == "cuadrado") { echo "selected"; } ?>>Cuadrado</option>
              </select>
            </div>

            <div class="col-3">
              <label class="form-label">Dimensiones</label>
              <select class="form-select" aria-label="Dimensiones" name="dimensiones" required>
                <option value="21x30" <?php if ($fila['dimensiones'] == "21x30") { echo "selected"; } ?>>21x30cm</option>
                <option value="35x50" <?php if ($fila['dimensiones'] == "35x50") { echo "selected"; } ?>>35x50cm</option>
                <option value="50x70" <?php if ($fila['dimensiones'] == "50x70") { echo "selected"; } ?>>50x70cm</option>
                <option value="70x100" <?php if ($fila['dimensiones'] == "70x100") { echo "selected"; } ?>>70x100cm</option>
              </select>
            </div>

            <div class="col-12">
              <h4>Información Comercial</h4>
            </div>

            <div class="col-3">
              <label class="form-label">Stock</label>
              <input type="number" class="form-control" aria-label="Stock Inicial" name="stock" value="<?php echo $fila['stock']; ?>" required>
            </div>

            <div class="col-3">
              <label class="form-label">Precio de Venta</label>
              <div class="currency-input"><span>$</span><input type="number" class="form-control" aria-label="Precio" name="precio" value="<?php echo $fila['precio']; ?>" required></div>
            </div>

            <div class="col-3 status-radio">
              <label class="form-label">Estado de la Publicación</label>
              <div class="form-check form-check-inline" aria-label="Estado">
                <input class="form-check-input" type="radio" name="estado" value="1" id="estado_a" <?php if ($fila['estado']==1) { echo 'checked="checked"'; } ?>>
                <label class="form-check-label" for="estado_a">Activa</label>
              </div>
              <div class="form-check form-check-inline" aria-label="Estado">
                <input class="form-check-input" type="radio" name="estado" value="0" id="estado_p" <?php if ($fila['estado']==0) { echo 'checked="checked"'; } ?>>
                <label class="form-check-label" for="estado_p">Pausada</label>
              </div>
            </div>

            <div>
              <input type="number" name="id_producto" value="<?php echo $fila['id_producto']; ?>" hidden>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
              <button class="btn btn-primary btn-lg small-green-button" type="submit" value="submit" name="submit" onclick ="checkCheckboxes();">Guardar Registro</button>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
              <a class="btn btn-secondary btn-lg small-green-button" href="pag_vproducto.php?id=<?php echo $fila['id_producto']; ?>">Cancelar</i></a>
            </div>
          </form>
        </div>

        <script type="text/javascript">
        function checkCheckboxes() {
          var categorias1 = document.getElementById('categorias1');
          var inputs = categorias1.getElementsByTagName('input');

          for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].checked) {
              return true;
            }
          }
          event.preventDefault();
          document.getElementById("check1_3").focus();
          document.getElementById('please-fill1').style.visibility='visible';
          return false;
        }
        </script>
        <!--End Form-->
      </div>
    </main>

    <footer>
      <?php include 'footer.php' ?>
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
