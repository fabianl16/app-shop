<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	public static $messages= [
    		'name.required' =>'Es necesario ingresar el nombre para registrar una categoria nueva',
    		'name.min' =>'El nombre de una categoria debe contener mas de 3 caracteres(letras) no se admiten siglas',
    		'name.unique' =>'No puede haber categorias con el mismo nombre',
    		'description.max' =>'La descripcion  solo puede llevar un maximo de 200 caracteres'

    	];



    	public static $rules = [
    		'name' => 'required|min:3|unique:categories,name',
    		'description' => 'max:200'
    	];



	protected $fillable = ['name', 'description'];


    //
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredProduct = $this->products()->first();
        return $featuredProduct->featured_image_url;
    }
}
