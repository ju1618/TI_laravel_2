@section ('pageTitle','Listado')

@extends('layouts.template')

@section('content')

<style media="screen">

  body{
    font-family: "Fira Sans", sans-serif; /*esto es para que si no carga la tipografia roboto me cargue la sans-serif*/
    background-image: url("../images/colorclaro.jpg");
    background-color: rgba(75,145,214,0.11);
    background-size:cover;
  }
  a{
    text-decoration: none;
    color: inherit; /*esto significa que esta heredando el color de su padre*/
    display: inline-block; /*para que tome los margenes y no ocupe todo el ancho, esto lo uso por default*/
  }
  .container{
    margin-top: 140px;
  }

  /* MODAL */

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
    width: 60%;
    max-width: 500px;
  }
  /* Caption of Modal Image */
  #caption {
    margin: auto;
    display: block;
    width: 60%;
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
    color: rgb(75,145,214);
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

<div class="container">

  <!-- check if $buscar variable is set, display buscar result -->
    @if (isset($producto))
    <!-- <div class="panel-heading card-title h2 font-weight-bold">Resultado de la busqueda</div>
      <ul>
      @foreach ($producto as $oneProduct)
        <li class="list-group-item list-group-item-action"><a href="/buscar/{{$oneProduct->id}}">{{$oneProduct->title}}</a></li>
      @endforeach
      </ul> -->

      <div class="panel panel-success">
            <div class="panel-heading card-title h2 font-weight-bold">Resultado de la busqueda</div>

            <div class="panel-body">

                <div class='table-responsive'>
                  <table class='table table-bordered table-hover table-striped'>
                    <thead class="thead-light">
                      <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Editar</th>
                        <th>Agregar al carrito</th>

                      </tr>
                    </thead>
                    <tbody>

                    @foreach($producto as $productos)
                        <tr>
                            <td scope="col align-middle">{{$productos['title']}}</td>
                            <td scope="col">
                              <div class="">
                                <img id="myImg" src="{{ asset('storage/product_image/'.$productos['product_image']) }}" class="img-thumbnail w-75">
                                <!-- The Modal -->
                                   <div id="myModal" class="modal">
                                     <span class="close">&times;</span>
                                     <img class="modal-content" id="img01">
                                     <div id="caption"></div>
                                   </div>


                              </div>
                            </td>
                            <td scope="col align-middle">{{$productos->category->name}}</td>
                            <td scope="col col-auto align-middle"><div class="col-md-auto">$ {{$productos['price']}} </div></td>
                            <td scope="col align-middle">{{$productos['description']}}</td>
                            <td scope="col align-middle"> <a href="#" class="btn btn-outline-danger btn-sm"> Ir </a> </td>
                            <td scope="col align-middle"> <a href="#" class="btn btn-outline-danger btn-sm"> Agregar </a> </td>

                        </tr>
                    @endforeach

                    </tbody>
                        </table>
                        <!-- <center>{{ $producto->appends(Request::only('title','price'))->links() }}</center> -->
                  </div>

            </div>
            <div class="panel-footer">
                <a href="/" class="btn btn-warning">Volver al Home</a>
            </div>
        </div>
    @endif

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

@endsection
