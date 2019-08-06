<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $products=Product::all();

        // return view('products.index', compact('products'));
        return view('layouts.template', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //

        return view('products.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
          'product-image'=>'required',
          'title'=>'required',
          'price'=>'required',
        ],
        [
          'required'=>'El campo :attribute es obligatorio',
          // 'numeric'=>'El campo :attribute debe ser numerico',
      ]);

      $product = new Product();

      $product->title=$request->input('title');
      $product->price=$request->input('price');
      $product->category=$request->input('category');
      $product->description=$request->input('description');

      $imagen = $request->file('product-image');

      if ($imagen) {
			// Armo un nombre único para este archivo
			$imagenFinal = uniqid("img_") . "." . $imagen->extension();
			// Subo el archivo en la carpeta elegida
			$imagen->storePubliclyAs("/public/product-image/", $imagenFinal);
			// Le asigno la imagen a la película que guardamos
			$product->image = $imagenFinal;
		}

      $product->save();
      // return view('products.addProduct', compact('request','product'));
      return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $products=Product::find($id);
        //
        // return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function buscar()
    {
      // $posts = Product::where('title', 'like', '%'.Input::get('search').'%')
      //           ->orWhere('description', 'like', '%'.Input::get('search').'%')
      //           ->orderBy('id', 'desc')->paginate(6);

      return view('buscar');
    }

    public function listar(Request $request)
    {
      $input = $request->all();

      if($request->get('search')){
          $producto = Product::where("title", "LIKE", "%{$request->get('search')}%")
              ->paginate(50);
        return view('listado', compact('producto'));
      }
      //else{
      //  $noticias = Noticia::paginate(5);
      //}

      // return response($noticias);
      return view('listado');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
