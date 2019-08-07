window.addEventListener("load", function(event) {
// Capturamos al formulario
var theForm = document.querySelector('form');
console.log(theForm);
// Obtenemos todos los campos, pero parseamos la colecciÃ³n a un Array
var formInputs = Array.from(theForm.elements);

// Sacamos la 1er posiciÃ³n del array que es el un <input> hidden del token
formInputs.shift();

// Sacamos al Ãºltimo elemento que es el <button>
formInputs.pop();

// ExpresiÃ³n regular para validar solo nÃºmeros
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
				erroresBE.style.display = 'none';				
			}



		// Pregunto si el campo estÃ¡ vacÃ­o (previo trimeo de espacios)
		if (this.value.trim() === '') {
			// Si el campo estÃ¡ vacÃ­o, le agrego la clase 'is-invalid'
			this.classList.add('is-invalid');
			//Voy a borrar el error de BE
			// document.getElementsByClassName('help-block').style.visibility='hidden';
			// Ademas, al <div> con clase 'invalid-feedback' le agremamos el texto de error
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
			if (this.name === 'title') {
				// Validamos que el texto insertado NO supere las 15 letras
				if (this.value.length > 15) {
					this.classList.add('is-invalid');
					this.nextElementSibling.innerHTML = 'El tÃ­tulo debe ser inferior a 15 letras';
					// Si un campo tiene error, creamos una key con el nombre del campo y valor true
					errorsObj[this.name] = true;
				}
			}

		}
	});

	/*
		Validamos el campo poster para verificar la extensiÃ³n
			- Lo hacemos fuera del evento blur
			- Esta validaciÃ³n se dispara cuando el campo cambia de valor, cuando se ha seleccionado un archivo
	*/
	if (oneInput.name === 'avatar') {
		oneInput.addEventListener('change', function () {
			// sacamos la extensiÃ³n del archivo
			var fileExtension = this.value.split('.').pop();
			// Array de estensiones permitidas
			var acceptedExtensions = ['jpg', 'jpeg', 'png'];
			/*
				Buscamos la extensiÃ³n del archivo actual en nuestro array de extensiones permitidas
				Si no se encuentra la extensiÃ³n dentro de nuestro array retorna undefined
			*/
			var extensionIsOk = acceptedExtensions.find(function (ext) {
				return ext === fileExtension;
			});

			// Validamos la extensiÃ³n
			if (extensionIsOk === undefined) {
				// Si la extensiÃ³n no es ninguna de la permitida
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
			// Si el campo estÃ¡ vacÃ­o creamos dentro del objeto de errores una key con valor true
			errorsObj[input.name] = true;
			// Asiganmos la clase de CSS
			input.classList.add('is-invalid');
			//Voy a borrar el error de BE

			// Mostramos el mensaje de error
			input.nextElementSibling.innerHTML = 'El campo <b>' + input.getAttribute('data-nombre') + '</b> es obligatorio. ';
		}
	});

	console.log('Campos con errores:', errorsObj);
	console.log('Cantidad de campos con errores:', Object.keys(errorsObj).length);

	// Si el objeto que contiene los errores NO estÃ¡ vacÃ­o evitamos que se SUBMITEE el formulario
	if (Object.keys(errorsObj).length > 0) {
		event.preventDefault();
	} else {
		var bandera = true;
	}


});
});
