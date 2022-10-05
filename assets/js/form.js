//mI preloader
window.addEventListener("load", () => {
    setTimeout(function() {
      $('body').addClass('loaded');
    }, 200);
  });


  const miForm = document.querySelector("#miForm");
    miForm.addEventListener("submit", (e) => {
      e.preventDefault();

      let nombre      = document.querySelector('#nombre').value;
      let apellido    = document.querySelector('#apellido').value;
      let email       = document.querySelector('input[name=email]').value;

      let inputTlf    = document.querySelector('#telefono');
          telefono    = inputTlf.value;
      let sueldo      = document.querySelector('#sueldo').value;
      console.log(nombre + ' - ' + apellido + ' - ' + email + ' - ' + telefono + ' - ' + sueldo);
 
    /**Validando los campos para evitar campos vacios */
    if (nombre.length === '' || email.length <= 0 || telefono === '' || sueldo ==='') {
      mensaje(tipoMensaje='CamposVacios');
      (telefono =='') ? inputTlf.focus() : '';
      return; 
    }
  
  btnEnviar.disabled = true; /*Desabilitando el boton Enviar*/
  btnEnviar.innerHTML = "Enviando mi Form..."; /*Cambiando el valor del boton*/
  loader(true); /*Mi funcion Pre-loader*/

      axios({
          method: "POST",
          url: "recibeForm.php",
          data: {
            nombre: nombre,
            apellido: apellido,
            email: email,
            telefono: telefono,
            sueldo: sueldo
          },
          headers: {
            "Content-Type": "multipart/form-data"
          },
        })
        .then((res) => {
          //console.log(res.data);
          /*Consulto la tabla de registros con ajax para evitar recargar la pagina,
            y muestro los resultados en el contenedor resultadoCapa
          */
          $.ajax({
            url: 'tabla.php',
            type: 'GET',
            success: function (resultado) {
              capaR = document.querySelector('#resultadoCapa').innerHTML=resultado;
            }
          });
          

          /**Utilizo un Ternario, Si existe el registro, 
          * lo actualizo de lo contrario lo inserto en la tabla */
          (res.data =='exitoInsert') ? mensaje('exitoInsert') : mensaje('exitoUpdate')

          loader(false);
          btnEnviar.disabled = false; /*Desabilitando el boton */
          btnEnviar.innerHTML = "Enviar Formulario"; /*Cambiando el valor del boton*/
        })
        .catch((err) => {
          throw err;
        })
        .finally(function () {
          console.log('Operacion terminada');
          
          miForm.reset(); //Limpiando formulario
        });
    });




/* Mi funcion Pre-loader */
var cargando = false;
function loader(cargando) {
  let body = document.body;
  if (cargando) {
      let body = document.body;
      body.style.opacity = "0.1";
      body.style.bottom = "0";
      body.style.left = "0";
      body.style.right = "0";
      body.style.top = "0";
      body.style.zIndex = "99999999999999999999";
  } else {
      body.style.opacity = "10";
  }
}


/**Funcion para mostrar mensaje de acuerdo a la respuesta */
function mensaje(tipoMensaje){
  let alerta = document.querySelector('.alert'); /**Accedo al div con la clase alerta */
  alerta.style.display='block'; /**Pongo visible el div */
  //console.log(tipoMensaje);

    if(tipoMensaje =='exitoUpdate'){ /** Actualizo registro por que ya existe en BD*/
      alerta.classList.replace("alert-danger", "alert-success");   
    //alerta.innerHTML =`<strong>Uhs!</strong> El empleado ya existe ⚠️ 😲 ..!`;

        alerta.innerHTML =`<strong>Felicitaciones!</strong> El empleado fue actualizado con éxito .! 👍`;
    }else if(tipoMensaje =='exitoInsert'){
        alerta.classList.replace("alert-danger", "alert-success"); 
        /** Se inserta el registro por que no existe en BD*/
        alerta.innerHTML =`<strong>Felicitaciones!</strong> El cliente fue registrado con éxito .! 👍`;
    }else{ /** Se inserta el registro por que no existe en BD*/
    alerta.classList.replace("alert-success", "alert-danger"); 
    alerta.innerHTML =`<strong>Uhs!</strong> Todos los campos son obligatorios ⚠️ 😭`;
    }

    /**Ocultar mensaje luego de 3 segundos */
    setTimeout(() => {
      alerta.style.display='none';
      }, "3000")
      
}