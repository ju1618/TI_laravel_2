
@section ('pageTitle','Profile')

@extends('layouts.template')

@section('content')

<!-- Css de profile-->
<style media="screen">
  .card{
    width: 100%;
  }

  *{
    box-sizing: border-box;
  }

  body{
    font-family:'Fira Sans', sans-serif;
    font-size: 16px;
    font-weight: 300px;
    line-height: 30px;
    padding-top: 70px;
    background-image: url("../images/gg.jpg");
    background-size: cover;
    overflow: auto;
  }

  img{
    width: 100%;/*para que tenga el ancho de us contenedor*/
  }


  .fotousuario {
   width: 40%;
   height: auto;
  }


  .container {
      position: relative;
      width: 100vw;
      margin-top: 10%;
      overflow: hidden;
  }

  .tap-sport-tools {
    width: 35vw;
    background-color: #4bd1b6;
    float: left;
    clear: both;
    padding: 8px;
    margin: 8px;
    height: auto;
    border-radius: 10px 10px;
    text-align: center;
    overflow: hidden;
    border: 10px solid #F52854;
  }

  .contenedor2 {
    width: 38vw;
    background-color: rgba(75,145,214,0.11);
    float: right;
    padding: 4px;
    margin: 5px;
    height: auto;
    overflow: hidden;
    border-radius: 10px 10px;
    border: 10px solid #F52854;
  }

  .item {
    font-size: 24px;
    color: black;
  }

  .contenedor3 {
    width: 38vw;
    float: right;
    background-color: beige;
    padding: 20px;
    margin: 10px;
    height: 77vh;
    border: 10px solid #F52854;
    overflow: hidden;
    border-radius: 10px 10px;
  }

  .contenedor4 {
    width: 38vw;
    float: right;
    background-color: #F52854;
    padding: 15px;
    margin: 8px;
    height: auto;
    border: 10px solid #F52854;
    overflow: hidden;
    border-radius: 10px 10px;
  }


  .facturadecompra {
    width: 49%;
    height: auto;
  }

  .contenedor5 {
    width: 35vw;
    float: left;
    background-color: rgba(59,20,173,0.11);
    padding: 10px;
    margin: 5px;
    height: auto;
    border: 10px solid #F52854;
    overflow: hidden;
    border-radius: 10px 10px;
  }

  @media screen and (min-width: 790px) {
    .contenedorprincipal {
      width: 100vw;
    }
  }

  @media screen and (max-width: 240px) {
    .contenedor1, .contenedor2, .contenedor3, .contenedor4, .contenedor5 {
      width: 100vw;
      clear: both;
    }
  }

</style>
<!--Fin de la hoja
<!-Estilo del javascript aplicado  a la factura-->
<style>
body {font-family: Arial, Helvetica, sans-serif;
padding-top: 100px;}

#myImg {
border-radius: 5px;
cursor: pointer;
transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
padding-top: 150px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
}

/* Caption of Modal Image */
#caption {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
text-align: center;
color: #ccc;
padding: 10px 0;
height: 150px;
}

/* Add Animation */
.modal-content, #caption {
-webkit-animation-name: zoom;
-webkit-animation-duration: 0.6s;
animation-name: zoom;
animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
from {-webkit-transform:scale(0)}
to {-webkit-transform:scale(1)}
}

@keyframes zoom {
from {transform:scale(0)}
to {transform:scale(1)}
}

/* The Close Button */
.close {
position: absolute;
top: 15px;
right: 35px;
color: #f1f1f1;
font-size: 40px;
font-weight: bold;
transition: 0.3s;
padding-top: 100px;
}

.close:hover,
.close:focus {
color: #bbb;
text-decoration: none;
cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
.modal-content {
  width: 100%;
}
}
</style>
<!---Fin de la hoja de estilo del JS-->

    <div class="container">
       <div data-type="timetable" data-id="85503" id="wgt-85503" class="tap-sport-tools" style="width:100%; height:auto;">
         <div class="row">
           <div class="col-lg-12">
                <h1 class = "item"><center>Mi Perfil, {{ $user->name }}</center></h1>

                 <img src="{{asset('storage/avatars/'.Auth::user()->avatar)}}" name="avatar" class="img-thumbnail img-responsive" style="width:300px; height:300px; float:center; border-radius:70%; margin-right:25px;">
           <form enctype="multipart/form-data" action="/home" method="POST">
               <label>Actualizar imagen</label>
               <input type="file" name="avatar">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="id" value="{{ Auth::user()->id }}">
               <br>
               <br>
               <h2 id="MisDatos" class = "item"><em><strong><center>Mis datos</center></strong></em></li></h2>
               <br>
               <p><strong>Usuario: </strong></p>
               <input type="text" name="username" value="{{ $user->username }}">
               <br>
               <p><strong>Nombre: </strong>   </p>
               <input type="text" name="name" value="{{ $user->name }}">
              <p><strong>Apellido: </strong>   </p>
               <input type="text" name="lastname" value="{{ $user->lastname}}">
               <br>
               <p><strong>Pais: </strong>  </p>
               <input type="text" name="country" value="{{ $user->country }}">
               <br>
               <p><strong>Email: </strong></p>
               <input type="text" name="email" value="{{ $user->email }}">
               <br>
               <br>
               <br>
               <input type="submit" class="pull-right btn btn-sm btn-primary">
               <br>
            </form>
        </div>
      </div>
     </div>
     <div id="wgt-ft-85503" class="contenedor2" style="width:100%; height:auto;">
       <div class="row">
        <div class="col-lg-12">
          <br>
          <br>
          <ul>
           <li> <a class="item" href="#MisDatos">Mis Datos</a></li>
           <br>
            <li><a class="item" href="#compras">Carrito de Compras</a></li>
            <br>
            <li><a class="item" href="#facturas">Facturación</a></li>
            <br>
            <li></li><a class="item" href="#cambiopass">Contraseña</a>
            <br>
            <br>
          </ul>
       </div>
      </div>
    </div>
      <div class="contenedor3" id="wgt-ft-85503" style="width:100%; height:auto;">
        <div class="row">
         <div class="col-lg-12">
         <br>
         <h2 id="compras" class="item"><em><strong><center>Carrito de Compras</center></strong></em></li></h2>
         <br>
          <img id="myImg" class="carritoCompra"  src="/images/carritocompra1.jpg" alt="carritoCompra" style="width:100%;max-width:300px">
         <br>
      </div>
    </div>
   </div>
      <div class="contenedor4" id="wgt-ft-85503" style="width:100%; height:auto;">
        <div class="row">
         <div class="col-lg-12">
         <br>
         <h2 id="facturas" class="item"><em><strong><center>Facturación</center></strong></em></li></h2>
          <img id="myImg" class="facturadecompra"  src="/images/facturamp.png" alt="factura de compra" style="width:100%;max-width:300px">

        <!-- The Modal -->
        <div id="myModal" class="modal">
          <span class="close">&times;</span>
          <img class="modal-content" id="img01">
          <div id="caption"></div>
        </div>

        <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        </script>
      </div>
    </div>
   </div>
      <div class="contenedor5" id="wgt-ft-85503" style="width:100%; height:auto;">
        <div class="row">
         <div class="col-lg-12">
         <br>
         <h2 id="cambiopass" class="item"><em><strong><center>Contraseña</center></strong></em></h2>
         <br>
         <br>
         <a  href="{{ route('changepassword') }}">Cambiar contraseña</a>
         <br>
         <br>
         <a  href="{{ route('logout') }}" class="btn btn-info btn-lg">
         <span class="glyphicon glyphicon-log-out"></span>Salir</a>
      </div>
    </div>
   </div>
 </div>
@endsection
