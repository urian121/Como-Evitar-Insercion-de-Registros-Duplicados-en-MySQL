<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Urian Viera :: WebDeveloper</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo-mywebsite-urian-viera.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="assets/css/material.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/loader.css">
</head>
    <body>
        <header>
          <div class="contenedor_header">
              <ul class="flex-container">
                <li class="flex-item"></li>
                <li class="flex-item">
                  <p>
                    <strong>
                    WebDeveloper - Urian Viera 😀 👍
                    </strong>
                  </p>
                </li>
                <li class="flex-item"></li>
              </ul>
          </div>
        </header>

        <div id="demo-content">
          <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
          <div id="content"> </div>
        </div>


        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center" style="padding:100px 0px;">
              <h3 class="text-center" style="font-size:40px; color:#333; font-weight:900;">
              &#128562; COMO EVITAR INSERCIÓN DE REGISTROS DUPLICADOS CON MySQL 2022 💥 ✅
              </h3>
            </div>
          </div>
        </div>

      <section>
          <div class="container">
            <div class="row">
            <div class="col-md-8 text-center">
              <?php include('tabla.php') ; ?>
            </div>

            <div class="col-md-4 text-center">
              <form accept-charset="utf-8" autocomplete="false">
                <div class="form-group mb-2 mt-2">
                <label for="Nombre">Nombre</label>
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                </div>
                <div class="form-group">
                <label for="apellido">Apellido</label>
                  <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido">
                </div>
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="Telefono">Telefono</label>
                  <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Telefono">
                </div>
                <div class="form-group">
                  <label for="Sueldo">Sueldo</label>
                  <input type="number" name="sueldo" id="sueldo" class="form-control" placeholder="Sueldo">
                </div>
                <button type="submit" id="EnviarForm" class="btn btn-primary mt-3 btn-block mb-2">Enviar Formulario</button>
              </form>
            </div>
          </div>
        </div>
      </section>


<?php include('footer.html'); ?>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="assets/js/material.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
  $(function() {
      setTimeout(function(){
        $('body').addClass('loaded');
      }, 1000);


      window.addEventListener("load", () => {
                const form = document.querySelector("form");
                form.addEventListener("submit", (e) => {
                    e.preventDefault();
                    let data = new FormData(form);
                    console.log(data);
                    axios({
                        method: "POST",
                        url: "/recibeForm.php",
                        data: data,
                        headers: { "Content-Type": "multipart/form-data" },
                    })
                        .then((res) => {
                            console.log(res);
                        })
                        .catch((err) => {
                            throw err;
                        });
                });
            });


function loaderF(statusLoader){
    console.log(statusLoader);
    if(statusLoader){
      $("#loaderFiltro").show();
      $("#loaderFiltro").html('<img class="img-fluid" src="assets/img/cargando.svg" style="left:50%; right: 50%; width:50px;">');
    }else{
      $("#loaderFiltro").hide();
    }
  }
});
</script>

</body>
</html>