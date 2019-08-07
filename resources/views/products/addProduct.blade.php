@extends('layouts.app')


@section('pageTitle', 'Agregar Producto')

@section('mainContent')



<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="/css/navstyle.css">
<link rel="stylesheet" href="/css/styles-footer.css">

@section('content')
<div class="productContainer">
  <a href="/home"> <img class="back-acount" src="/images/back.png" width="50px;" alt=""> </a>
  <form class="" action="/products/addProduct" method="post" enctype="multipart/form-data">
    @csrf

      <div class="form-group">
        <label for="title">Nombre del producto: </label>
        <input type="text" class="form-control" name="title" value="">
      </div>

      @if($errors->has('title'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('title') }}</strong>
          </span>
      @endif

        <div class="form-group">
          <label for="image">Imagen del producto: </label>
          <input type="file" class="form-control-file" name="image" value="">
        </div>


      <div class="form-group">
        <label for="price">Precio: </label>
        <input type="text" class="form-control" name="price" value="">
      </div>


      <div class="form-group">
        <label for="category">Categoria: </label>

        <select class="form-control" name="category" >
          @foreach ($categories as $category)
          <option>{{$category->name}}</option>
          @endforeach
          
        </select>
      </div>


      <div class="form-group">
        <label for="description">Descripción: </label>
        <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
      </div>
      <input type="submit" name="add" class="btn btn-primary my-1 " style="width: 200px;" value="Agregar">


  </form>
</div>

@endsection
