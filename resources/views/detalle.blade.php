@section ('pageTitle','Detalle del producto')

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
  <h2>Detalle de: {{$products->title}} </h2>
  <img id="myImg" src="{{ asset('storage/product_image/'.$products['product_image']) }}" class="img-thumbnail w-75">
  <p class="text-dark">{{$products->price}}</p>
  <p class="text-body">{{$products->description}}</p>





<div class="card center" style="width: 18rem;">
  <img src="{{ asset('storage/product_image/'.$products['product_image']) }}" class="img-thumbnail">
  <div class="card-body">
    <h5 class="card-title">Detalle de:{{$products->title}}</h5>
    <p class="card-text text-black-50">{{$products->price}}</p>
    <p class="card-text text-black-50">{{$products->description}}</p>
    <a href="/" class="btn btn-primary">Go Home</a>
  </div>
</div>

</div>

@endsection
