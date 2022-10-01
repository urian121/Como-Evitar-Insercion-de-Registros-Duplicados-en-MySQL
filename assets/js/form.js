window.addEventListener("load", () => {
    setTimeout(function() {
      $('body').addClass('loaded');
    }, 500);

    const miForm = document.querySelector("#miForm");
    miForm.addEventListener("submit", (e) => {
      e.preventDefault();

      let nombre      = document.querySelector('#nombre').value;
      let apellido    = document.querySelector('#apellido').value;
      let email       = document.querySelector('input[name=email]').value;
      let telefono    = document.querySelector('#telefono').value;
      let sueldo      = document.querySelector('#sueldo').value;
      console.log(nombre + ' - ' + apellido + ' - ' + email + ' - ' + telefono + ' - ' + sueldo);

  /**Validando los campos para evitar campos vacios */
  if((nombre ==='')){
    alert('campo vacio');
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
          /**Utilizo un Ternario, Si existe el registro, lo actualizo */
          (res.data ==1) ? mensaje(res.data) : mensaje(res.data)

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
function mensaje(type){
    console.log(type);
    let divMensaje = document.querySelector('#msj'); /**Accedo a la capa del mensaje */
    divMensaje.style.display='block'; /**Pongo la capo msj visible */

    if(divMensaje ==1){ /** Actualizo registro por que ya existe en BD*/
        divMensaje.innerHTML =`<strong>Felicitaciones!</strong> Empleado fue actualizado con éxito .! 👍`;
    }else{ /** Se inserta el registro por que no existe en BD*/
        divMensaje.innerHTML =`<strong>Felicitaciones!</strong> El Cliente fue registrado con éxito .! 👍`;
    }

    /**Ocultar mensaje luego de 3 segundos */
    setTimeout(() => {
        divMensaje.style.display='none';
      }, "3000")
      
}