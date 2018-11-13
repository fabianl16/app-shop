@extends('layouts.app')
@section('title', 'Categorias')
@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('/img/examples/fondo.jpg')}}');">   
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Lista de categorias para productos</h2>

<div class="team">
<div class="row">
<a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Registrar nueva categoria</a>
<table class="table">
    <thead>
        <tr>
        <th class="text-center">#</th>
        <th class="col-md-2 text-center">Nombre</th>
        <th class="col-md-5 text-center">Descripcion</th>
        <th class="text-right">Acciones</th>
        </tr>
    </thead>
    @foreach ($categories as $key => $category)
    <tbody>
        <tr>
            <td class="text-center">{{ ($key)+1 }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
           
            <td class="td-actions text-right">
               <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                    {{csrf_field() }}
                    {{ method_field('DELETE') }}

                     <a href="#" rel="tooltip" title="Ver categoria" class="btn btn-info btn-simple btn-xs">
                    <i class="fa fa-info"></i>
                </a>
                <a href=" {{ url('/admin/categories/'.$category->id.'/edit') }} " rel="tooltip" title="Editar categoria" class="btn btn-success btn-simple btn-xs">
                    <i class="fa fa-edit"></i>
                </a>
                
 
                    <button type="submit" rel="tooltip" title="Eliminar categoria" class="btn btn-danger btn-simple btn-xs">
                    <i class="fa fa-times"></i>
                </button>

                </form>
                
            </td>
        </tr>
        @endforeach

    </tbody>

</table>
{{ $categories->links() }}
            </div>

        </div>


        
    </div>

</div>

@include('includes.footer')

@endsection
