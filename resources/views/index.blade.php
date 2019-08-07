@extends('layouts.template')

@section('content')

  <!-- @foreach ($categories as $category)
      <ul>
        <li>{{$category->name}}</li>
      </ul>
  @endforeach -->

<div class="text-left" style=" margin:200px 0px 0px 100px;">
  <h1>Productos</h1>
</div>
<div class="card-deck" style=" margin:50px 100px 100px 100px;">

  @foreach($products as $product)

  <div class="card" style="width: 18rem;">
  <img src="{{asset('storage/product_image/'. $product->product_image)}}" style="margin-top:5px;" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$product->title}}</h5>
    <p class="card-text">{{$product->description}}</p>

    <div class="btn-group">
      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Detalles
      </button>
      <div class="dropdown-menu">
        <h5 class="dropdown-item" >{{ $product->category->name }}</h5>
        <p class="card-text dropdown-item">{{$product->description}}</p>
      </div>
    </div>

  </div>
  </div>
  @endforeach
  <div class="arrowPage" style="position: absolute; left: 45%; top: 110%;">
      {{ $products->links() }}
  </div>

</div>



@endsection
