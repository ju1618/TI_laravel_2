window.addEventListener("load", function(event) {
// Capturamos al formulario, agrego evento load porque no me tomaba el elemento, porque no cargo el DOM
var theForm = document.querySelector('form');
console.log(theForm);
// Pasamos a array
var formInputs = Array.from(theForm.elements);
// Sacamos sacamos la posicion token
formInputs.shift();
// Sacamos el boton
formInputs.pop();
// Es un regex
var regexNumber = /^\d+$/;
// Objeto literal para verificar si un campo tiene error
var errorsObj = {};
// Recorremos el array y asignamos la validaciÃ³n bÃ¡sica
formInputs.forEach(function (oneInput) {
	// A cada campo le asignamos el evento blur y su funcionalidad
	oneInput.addEventListener('blur', function () {
			var erroresBE = document.getElementById('support-class');
			console.log('es' + erroresBE);
			if (erroresBE != null) {
        //Si BE envio un msj de error EJ: 'Credenciales incorrectas' , lo limpio para que no se superponga al FE
        erroresBE.style.display = 'none';
			}
		// Pregunto si el campo esta vacio (previo trimeo de espacios)
		if (this.value.trim() === '') {
			// Si el campo esta vacio,agrego la clase 'is-invalid'
			this.classList.add('is-invalid');
			//Voy a borrar el error de BE
			// document.getElementsByClassName('help-block').style.visibility='hidden';
			// Aremamos el texto de error
			this.nextElementSibling.innerHTML = 'El campo <b>' + this.getAttribute('data-nombre') + '</b> es obligatorio. ';
			// Si un campo tiene error, creamos una key con el nombre del campo y valor true
			errorsObj[this.name] = true;
		} else {
			// Cuando el campo NO estÃ¡ vacÃ­o

			// Quitamos la clase de error SI existiera
			this.classList.remove('is-invalid');

			// Si la data es correcta, asignamos esta clase de bootstrap
			this.classList.add('is-valid');

			// Al mensaje de error le sacamos el texto
			this.nextElementSibling.innerHTML = '';

			// Si un campo NO tiene error, eliminamos la key del objeto y su valor
			delete errorsObj[this.name];

			// Validamos el tipo de dato del campo title
			if (this.name === 'password') {
				// Validamos que el texto insertado NO supere las 15 letras
				if (this.value.length < 5) {
					this.classList.add('is-invalid');
					this.nextElementSibling.innerHTML = 'La password debe tener mas de 5 caracteres.';
					// Si un campo tiene error, creamos una key con el nombre del campo y valor true
					errorsObj[this.name] = true;
				}
			}

      // if (this.name === 'password') {
      //   var validPass = /DH/;
			// 	// Validamos que el texto contenga un patron tal como 'DH'
			// 	if (!this.value.test(validPass)) {
			// 		this.classList.add('is-invalid');
			// 		this.nextElementSibling.innerHTML = 'Oh no.';
			// 		// Si un campo tiene error, creamos una key con el nombre del campo y valor true
			// 		errorsObj[this.name] = true;
			// 	}
			// }


      //Validamos si las pass coinciden
      if (this.name === 'password_confirmation') {
				// Validamos que el contenido del campo re-pass sea igual al de pass
        console.log('repass' + this.value);
        var auxP = document.getElementById('password');
        console.log('pass' + auxP.value);
				if (this.value != auxP.value) {
          console.log('pass distitntas')
          // this.classList.add('is-invalid');
					this.nextElementSibling.innerHTML = 'Las password deben coincidir.';
					// Si un campo tiene error, creamos una key con el nombre del campo y valor true
					errorsObj[this.name] = true;
				}
			}

		}
	});

	/*
		Validamos el campo poster para verificar la extensión
			- Lo hacemos fuera del evento blur
			- Se dispara cuando el campo cambia de valor, cuando se ha seleccionado un archivo
	*/
	if (oneInput.name === 'avatar') {
		oneInput.addEventListener('change', function () {
			// sacamos la extensiÃ³n del archivo
			var fileExtension = this.value.split('.').pop();
			// Array de estensiones permitidas
			var acceptedExtensions = ['jpg', 'jpeg', 'png'];
			/*
		          Busca extension , si no la encuentra da error
			*/
			var extensionIsOk = acceptedExtensions.find(function (ext) {
				return ext === fileExtension;
			});

			// Validamos la extension nuvamente
			if (extensionIsOk === undefined) {
				// Si la extension no es ninguna de la permitida
				this.classList.add('is-invalid');
				this.nextElementSibling.innerHTML = 'Formato invÃ¡lido. Los formatos soportados son jpg, jpeg y png';
				// Si un campo tiene error, creamos una key con el nombre del campo y valor true
				errorsObj[this.name] = true;
			} else {
				this.classList.remove('is-invalid');
				this.classList.add('is-valid');
				this.nextElementSibling.innerHTML = '';
			}
		});
	}
});

// Si tratan de enviar el formulario
theForm.addEventListener('submit', function (event) {
	// Al momento de SUBMITEAR el formulario iteramos los campos y validamos si estÃ¡n vacÃ­os
	formInputs.forEach(function (input) {
		if (input.value.trim() === '') {
			// Si el campo esta vacio creamos dentro del objeto de errores una key con valor true
			errorsObj[input.name] = true;
			// Asiganmos la clase de CSS
			input.classList.add('is-invalid');
			// Mostramos el mensaje de error
			input.nextElementSibling.innerHTML = 'El campo <b>' + input.getAttribute('data-nombre') + '</b> es obligatorio. ';
		}
	});

	console.log('Campos con errores:', errorsObj);
	console.log('Cantidad de campos con errores:', Object.keys(errorsObj).length);

	if (document.getElementById('country').value.toLowerCase() != 'argantina') {
		var auxC = document.getElementById('city');
		this.classList.remove('is-invalid');
		this.classList.add('is-valid');
		this.nextElementSibling.innerHTML = '';
	}
	// Si el objeto que contiene los errores no esta vacÃ­o evitamos que se SUBMITEE el formulario
	if (Object.keys(errorsObj).length > 0) {
		if (Object.keys(errorsObj['city']) == true) {
			console.log('te botonea el city');
		}

		event.preventDefault();
    console.log('pervino el submit');
	} else {
		var bandera = true;
	}


});
});
