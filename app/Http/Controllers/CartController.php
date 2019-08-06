<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
      public function __construct()
      {
       if(!\Session::has('cart'))  \Session::put('cart', array());
       }

      //Mostrar Carrito
       public function show(){
         $cart = \Session::get('cart');
         return view('store.cart', compact('cart'));
       }

        //Agregar item
        public function add(Product $product){
          $cart = \Session::get('cart');
          $product ->quantity = 1;
          $cart[$product->slug] = $product;
          \Session::put('cart', $cart);
          return redirect()->route('cart-show');
        }

        //Eliminar item
        public function delete(Product $product){
          $cart = \Session::get('cart');
          unset($cart[$product->slug]);
          \Session::put('cart', $cart);
          return redirect()->route('cart-show');
        }

        //Actualizar item
        public function update(){
          \Session::put('cart, $cart');
          return redirect()->route('cart-show');

        }

        //Vaciar el Carrito
        public function trash(){
          \Session::forget('cart');
          return redirect()->route('cart-show');
        }
        //Obtener el total a pagar por los items del carrito
        private function total() {
         $cart = \Session::get('cart');
         $total = 0;
           foreach($cart as $item) {
             $total += $item->price * $item->quantity;
        }
         return $total;
        }
}
