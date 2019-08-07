@extends('layouts.template')

<link rel="stylesheet" href="/css/styles.css">

@section('content')
<style media="screen">
.container{
  margin-top: 120px;
}

.arrowPage{

  margin-top: 70%;

}
</style>

<div class="container">


  <header>

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
          <div class="carousel-item active special-item ">
            <img class="logo-img" src="/images/log.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item special-item">
            <img src="/images/office-2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item special-item">
            <img src="/images/cook.jpg" class="d-block w-100" alt="...">
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <div class="arrow-control">
              <img src="/images/chevron-left.png" >

            </div>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <div class="arrow-control">
              <img src="/images/chevron-right.png" >

            </div>
          </a>
      </div>



  </header>

  <div class="text-left" style=" margin:100px 0px 0px 100px;">
    <h1>Productos</h1>
  </div>
  <div class="card-deck product-deck" style=" margin:50px 100px 100px 100px;">

    @foreach($products as $product)

    <div class="card" style="width: 18rem;">
    <img src="{{asset('storage/product_image/'. $product->product_image)}}" style="margin-top:5px;" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">$ {{$product->price}}</h5>


      <div class="btn-group">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Detalles
        </button>
        <div class="dropdown-menu">
          <h5 class="card-title">{{$product->title}}</h5>
          <small class="dropdown-item text-muted" >{{ $product->category->name }}</small>
          <p class="card-text dropdown-item">{{$product->description}}</p>
        </div>
      </div>


    </div>
    </div>
    @endforeach

    <div class="arrowPage" >
        {{ $products->links() }}
    </div>

  </div>

</div>

@endsection
