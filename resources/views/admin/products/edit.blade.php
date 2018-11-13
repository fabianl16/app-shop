@extends('layouts.app')
@section('title', 'Gestion de Productos')
@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('/img/examples/fondo.jpg')}}');">
</div>

<div class="main main-raised">
    <div class="container">
        
        <div class="section ">
            <h2 class="title text-center">Editar producto</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                
            </div>
            @endif

           <form method="post" action=" {{ url('/admin/products/'.$product->id.'/edit') }} ">

            {{csrf_field() }}

            <div class="row">
               
               <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                </div>
            </div> 

            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Precio</label>
                    <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product->price) }}">
                </div>
                
            </div>
        </div>

            

                <div class="row">
               
               <div class="col-sm-6">
              <div class="form-group label-floating">
                    <label class="control-label">Descripcion corta</label>
                    <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}">
                </div>
            </div> 

            <div class="col-sm-6">
                 <div class="form-group label-floating">
                    <label class="control-label">Categoria del producto</label>
                    <select class="form-control" name="category_id">
                      <option value="0">General</option>
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @if($category->id == old('category_id', $product->category_id)) selected @endif>
                          {{ $category->name }}
                      </option> 
                      @endforeach 
                    </select>
                </div>
                
            </div>
        </div>

           <textarea class="form-control" placeholder="Descripcion detallada" rows="5" name="long_description" >{{ old('long_description', $product->long_description)}}</textarea>

           
          

            <button class="btn btn-primary">Guardar cambios</button>
            <a href="{{url('/admin/products')}}" class="btn btn-default">Cancelar</a>



            </div>

            








               
           </form>

        </div>


        
    </div>

</div>

@include('includes.footer')

@endsection
