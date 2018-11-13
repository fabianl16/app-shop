@extends('layouts.app')
@section('title', 'Gestion de categorias')
@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('/img/examples/fondo.jpg')}}');">
</div>

<div class="main main-raised">
    <div class="container">
        
        <div class="section ">
            <h2 class="title text-center">Formulario de registro para una nueva categoria</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                
            </div>
            @endif

           <form method="post" action=" {{ url('/admin/categories/') }} ">

            {{csrf_field() }}

            <div class="row">
               
               <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre de la categoria</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
            </div> 
        </div>


           <textarea class="form-control" placeholder="Descripcion detallada" rows="5" name="description">{{ old('description') }}</textarea>

           
          

            <button class="btn btn-primary">Registrar categoria</button>
             <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancelar</a>
            </div>

            








               
           </form>

        </div>


        
    </div>

</div>

@include('includes.footer')


@endsection
