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

</style>

<div class="container">

  <!-- check if $buscar variable is set, display buscar result -->
    @if (isset($producto))
        <div class="panel panel-success">
            <div class="panel-heading card-title h2 font-weight-bold">Resultado de la busqueda</div>
            <div class="panel-body">

                <div class='table-responsive'>
                  <table class='table table-bordered table-hover table-striped'>
                    <thead class="thead-light">
                      <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Editar</th>

                      </tr>
                    </thead>
                    <tbody>

                    @foreach($producto as $productos)
                        <tr>
                            <td scope="col">{{$productos['title']}}</td>
                            <td scope="col">  <img src="{{ asset('storage/product_images/'.$productos['product-image']) }}" class="img-thumbnail w-75"></td>
                            <td scope="col"><div class="w-100">$ {{$productos['price']}} </div></td>
                            <td scope="col">{{$productos['description']}}</td>
                            <td scope="col"> <a href="#" class="btn btn-info"> Ir </a> </td>

                        </tr>
                    @endforeach

                    </tbody>
                        </table>
                        <center>{{ $producto->appends(Request::only('title','price'))->links() }}</center>
                    </div>

            </div>
            <div class="panel-footer">
                <a href="/" class="btn btn-warning">Volver al Home</a>
            </div>
        </div>
    @endif

</div>


@endsection
