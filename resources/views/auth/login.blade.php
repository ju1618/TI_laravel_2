<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Etiqueta meta -->
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <!-- LLamda a font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Llamada a bootstrap y relacionados -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
    <!-- Enlazo mi hoja de estilo -->
    <link rel="stylesheet" href="{!! asset('css/styles-login.css') !!}">
    <!-- Y normalizo -->
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssnormalize/cssnormalize-min.css">
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script>
		$(document).on('ready', function() {
			$('#show-hide-passwd').on('click', function(e) {
				e.preventDefault();
				var current = $(this).attr('action');
				if (current == 'hide') {
					$(this).prev().attr('type','text');
					$(this).removeClass('fas fa-eye-slash').addClass('fas fa-eye').attr('action','show');
				}
				if (current == 'show') {
					$(this).prev().attr('type','password');
					$(this).removeClass('fas fa-eye').addClass('fas fa-eye-slash').attr('action','hide');
				}
			})
		})
	</script>
  </head>
  <body>
      <div class="mi-contenedor">
          <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3">
                        <h1 class="mi-marca"><img src="images/logo.png" height="45px" width="55px" alt="logo"><strong>  market palace</strong></h1>
                        <div class="mis-descripciones">
                          <p>Un lugar donde encontrás todo lo que querés</p>
                        </div>
                    </div>
                </div>
                <!-- Aca va a ir el contenedor del form -->
                <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 mi-form-contenedor">
                            <!-- Como si fuera el 'header' del formulario -->
                              <div class="mi-cabecera-form">
                                  <div class="mi-contenido-izquierdo">
                                        <h3> Ingresa aqui tus credenciales</h3>
                                        <a href="{{ url('/register') }}">No estas registrado? </a><a href="{{ route('password.request') }}">  Olvidaste tu password?</a>
                                  </div>
                                  <div class="mi-contenido-derecho">
                                        <i class="far fa-user-circle"></i>
                                  </div>
                            <!-- Aca va a ir el formulario en si       -->
                            </div>
                            <div class="mi-principal-form">
                                  <form role="form" class="" action="" method="post">

                                    {{ csrf_field() }}

                                      <!-- Agrupamientos de los inputs, usamos unas clases propias de bootstrap -->
                                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Ingresa tu usuario..." class="form-control" id="email" required autofocus>
                                            <!-- <div class="invalid-feedback">

        				                            </div> -->
                                            @if ($errors->has('email'))
                                              <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                            @endif

                                      </div>
                                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input type="password" name="password" value="" placeholder="Ingresa tu password..." class="form-control" id="password" required>
																						<i id="show-hide-passwd" action="hide" class="fas fa-eye-slash mi-check" aria-hidden="true"></i>
                                            <!-- <div class="invalid-feedback">

        				                            </div> -->
                                            @if ($errors->has('password'))
                                              <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                            @endif

                                      </div>
                                      <button type="submit" name="button" class=" btn btn-primary mi-boton">Ingresar</button>
                                  </form>
                            </div>
                      </div>
                </div>
                <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 mis-redes-sociales">
                          <p>También estamos en las redes!</p>
                          <div class="mis-botones-redes">
                            <a class="mi-boton-redsocial" href="#">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a class="mi-boton-redsocial" href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="mi-boton-redsocial" href="#">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                          </div>
                      </div>
                </div>
                </div>
                <footer class="mi-footer"><h5 class="mi-texto-footer">© 2017-2019 Company, Inc.</h5></footer>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12 mi-sidebar">
            <ul class="nav navbar-nav list-inline">
                <li class="list-inline-item"><a class="" href="/"><i class="fas fa-home"></i></a></li>
                <li class="list-inline-item"><a class="" href="/profile"><i class="fas fa-user-alt"></i></a></li>
                <li class="list-inline-item"><a class="" href="/faq"><i class="fas fa-question"></i></li>
                <li class="list-inline-item"><a class="" href="#"><i class="fas fa-headset"></i></li>
            </ul>
          </div>
      <!-- </div> -->
  </body>
</html>
