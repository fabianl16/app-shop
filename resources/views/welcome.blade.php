@extends('layouts.app')


@section('title', 'Bienvenido a GameRush')


@section('body-class', 'landing-page')


@section('styles')
<style >
    
    .team .row .col-md-4 {
        margin-bottom: 5em;
    }
    .row{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display:         flex;
        flex-wrap: wrap; 

    }
    .row >[class*='col-']{
        display: flex;
        flex-direction: column;
    }

</style>
@endsection


@section('content')


<div class="header header-filter" style="background-image: url('{{asset('/img/examples/fondo.jpg')}}');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">GameRush Oficial</h1>
                <h4>GAMERUSH SA de CV es una empresa dedicada a llevar el entretenimiento más actual en videojuegos a nuestros clientes mediante la comercialización de los mismos en nuestras tiendas especializadas.</h4>
               
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> ¿Como funciona?
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">¿Porque confiar en nosotros?</h2>
                    <h5 class="description">Contamos con toda una gama de videojuegos para las plataformas mas populares.</h5>
                </div>
            </div>

            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-primary">
                                <i class="material-icons">chat</i>
                            </div>
                            <h4 class="info-title">Atendemos tus dudas</h4>
                            <p>Atendemos rápidamente cualquier consulta que tengas vía correo electronico. No estás sólo, sino que siempre estamos atentos a tus inquietudes.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Pago seguro</h4>
                            <p>Todo pedido que realices será confirmado a través de una llamada. Si no confías en los pagos en línea puedes pagar contra entrega el valor acordado.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Información privada</h4>
                            <p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section text-center">
            <h2 class="title">Visita nuestras categorias</h2>

            <div class="team">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="{{ $category->featured_image_url }}" alt="Imagen Representativa de la categoria {{ $category->name }}" class="img-raised img-circle">
                            <h4 class="title">
                                <a href=" {{ url('/categories/'.$category->id) }} "> {{ $category->name }}</a>
                            </h4>
                            <p class="description">{{ $category->description }}</p>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>

        </div>


        
    </div>

</div>

@include('includes.footer')

@endsection
