
@extends('layouts.template')

@section('header')
  <header>

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
          <div class="carousel-item active special-item ">
            <img src="/images/log.png" class="d-block w-100" alt="...">
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
@endsection
