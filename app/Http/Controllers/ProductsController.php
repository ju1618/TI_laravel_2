<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\Category;

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

        $products=Product::paginate(3);
       $categories=Category::all();
       // return view('products.index', compact('products'));
       return view('index', compact('products', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
        $categories=Category::all();

        return view('products.addProduct', compact('categories'));
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

        $products=Product::find($id);

        return view('detalle', compact('products'));
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



    public function buscar(Request $request)
    {
      $input = $request->all();

      if($request->get('search')){
          $producto = Product::where("title", "LIKE", "%{$request->get('search')}%")
                      ->paginate(50);
          // $categoria = DB::table('categories')->select('title')->where('id', '{{$producto->'category_id'}}'); //quiero que me devuelva
                // SELECT title FROM categories WHERE id = $producto('category_id')

            // $categoria = DB::select('SELECT title FROM categories WHERE id = ?' , ['$producto['category_id']']);
            $categoria = DB::table('categories')
                              ->join('products', 'categories.id', '=', 'products.category_id')
                              ->value('name');

        return view('buscar', compact('producto', 'categoria'));
      }

      return redirect('/home');

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
