<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-style.css') }}">


  </head>
  @include('products.header')

  <body >

    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->



    <!-- <div class="card-deck">
    @foreach ($products as $key => $product)
      @if($key < 5)
       <div class="card">
         <img src="/storage/posters/{{ $product->image }}" class="card-img-top" />
         <div class="card-body">
           <h1 class="card-title">{{$product->title}}</h1>
           <h5>$ {{$product->price}}</h5>
           <p class="card-text">{{$product->description}}</p>
         </div>
         <div class="card-footer">
           <small class="text-muted">Last updated 3 mins ago</small>
         </div>
       </div>
      @endif

    @endforeach
  </div> -->

  <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
  <!-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false"> -->
  <div class="category">
    <h3 class="title-product text-left" id="cocina">Cocina</h3>
  </div>
    <ol class="carousel-indicators">
     @foreach( $products as $photo )
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
     @endforeach
    </ol>

    <div class="carousel-inner mx-auto" role="listbox" >
      @foreach( $products as $product )
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <!--   <img class="d-block img-fluid" src="{{ $photo->image }}" alt="">
                <div class="carousel-caption d-none d-md-block">
                   <h3>{{ $photo->title }}</h3>
                   <p>{{ $photo->description }}</p>
                </div> -->

                 <div class="card products" >
                   <img src="/storage/posters/{{ $product->product-image }}" class="card-img-top" />
                   <div class="card-body">
                     <h1 class="card-title">{{$product->title}}</h1>
                     <h5>$ {{$product->price}}</h5>
                     <p class="card-text">{{$product->description}}</p>
                   </div>
                   <div class="mx-auto">
                     <button type="button" class="btn btn-info" style="width: 200px;">Info</button>

                   </div>
                   <div class="card-footer">
                     <small class="text-muted">{{$product->updated_at}}</small>
                   </div>
                 </div>

         </div>
      @endforeach
    </div>
    <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> -->
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <div class="arrow-control-pr">
          <img src="/images/arrow-left.svg">
      </div>

    </a>

    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <div class="arrow-control-pr">
          <img src="/images/arrow-right.svg">
      </div>
    </a>
  </div>






  </body>
</html>
