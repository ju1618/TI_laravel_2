<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Carrito de Compras</title>
  </head>
  <body>
    <div class="container text-center">
      <div class="page-header">
        <h1><i class="fa fa-shopping-cart"></i>Carrito de Compras </h1>
      </div>
      <div class="table-cart">
        @if(count($cart))
        <p>
           <a href="{{ route('cart-trash') }}" class="btn btn-danger">Vaciar carrito <i class="fa fa-trash"></i> </a>
        </p>
        <div class="table table-striped table-hover table-bordered">
          <thead>
              <tr>
                <th>Producto</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Quitar</th>
              </tr>
          </thead>

        </div>
      </div>
    </div>
  </body>
</html>
