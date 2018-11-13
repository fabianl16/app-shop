@extends('layouts.app')
@section('title', 'Productos')
@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('/img/examples/fondo.jpg')}}');">   
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Lista de productos en tienda</h2>

<div class="team">
<div class="row">
<a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Registrar nuevo producto</a>
<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="col-md-2 text-center">Nombre</th>
            <th class="col-md-5 text-center">Descripcion</th>
            <th class="text-center">Categoria</th>
            <th class="text-right">Precio</th>
            <th class="text-right">Acciones</th>
        </tr>
    </thead>
    @foreach ($products as $product)
    <tbody>
        <tr>
            <td class="text-center">{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->category_name }}</td>
            <td class="text-right">&dollar; {{ $product->price }}</td>
            <td class="td-actions text-right">
               

                <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                    {{csrf_field() }}
                    {{ method_field('DELETE') }}

                     <a href="{{ url('/products/'.$product->id) }}" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                    <i class="fa fa-info"></i>
                </a>
                <a href=" {{ url('/admin/products/'.$product->id.'/edit') }} " rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-simple btn-xs">
                    <i class="fa fa-image"></i>
                </a>
 
                    <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                    <i class="fa fa-times"></i>
                </button>

                </form>
                
            </td>
        </tr>
        @endforeach

    </tbody>

</table>
{{ $products->links() }}
            </div>

        </div>


        
    </div>

</div>

@include('includes.footer')

@endsection
