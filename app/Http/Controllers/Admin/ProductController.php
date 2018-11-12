<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
       return view('admin.products.index')->with(compact('products'));
    }

    public function create()
    {
      return view('admin.products.create');
    }
    public function store(Request $request)
    {
    	$messages= [
    		'name.required' =>'Es necesario ingresar el nombre para registrar un nuevo producto',
    		'name.min' =>'El nombre del producto debe contener mas de 3 caracteres(letras)',
    		'description.required' =>'Una descripcion corta es necesara para ingresar un producto nuevo',
    		'description.max' =>'La descripcion corta solo puede llevar un maximo de 200 caracteres',
    		'description.min' =>'La descripcion corta debe contener un minimo de 20 caracteres',
    		'price.required' =>'El precio para un producto nuevo es OBLIGATORIO',
    		'price.min' =>'El precio no puede contener valores por menos de $100 y/o no pueden ser negativos',
    		'price.max' =>'El precio no puede subir de mas de $2000',
    		'price.numeric' =>'En el precio solo se pueden admitir nuemeros',



    	];



    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200|min:20',
    		'price' => 'required|numeric|min:100|max:2000'


    	];
    	$this->validate($request, $rules, $messages);

    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->price = $request->input('price');
    	$product->description = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->save();

    	return redirect('/admin/products');


    }

public function edit($id)
    {
    	//return "Mostrar aqui el form de edicion para el producto con id $id";
    	$product = Product::find($id);
      return view('admin.products.edit')->with(compact('product')) ;
    }
    public function update(Request $request, $id)
    {
    	

    	$messages= [
    		'name.required' =>'Es necesario ingresar un nombre para actualizar producto',
    		'name.min' =>'El nombre del producto debe contener mas de 3 caracteres(letras)',
    		'description.required' =>'Una descripcion corta es necesaria',
    		'description.max' =>'La descripcion corta solo puede llevar un maximo de 200 caracteres',
    		'description.min' =>'La descripcion corta debe contener un minimo de 20 caracteres',
    		'price.required' =>'El precio para actualizar un producto es OBLIGATORIO',
    		'price.min' =>'El precio no puede contener valores por menos de $100 y/o no pueden ser negativos',
    		'price.max' =>'El precio no puede subir de mas de $2000',
    		'price.numeric' =>'En el precio solo se pueden admitir nuemeros',



    	];



    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200|min:20',
    		'price' => 'required|numeric|min:100|max:2000'


    	];
    	$this->validate($request, $rules, $messages);

    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->price = $request->input('price');
    	$product->description = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->save();

    	return redirect('/admin/products');


    }


public function destroy($id)
    {
    	//dd($request->all());

    	$product = Product::find($id);
    	$product->delete();

    	return back();


    }







}

