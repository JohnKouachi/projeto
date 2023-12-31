

@extends('layouts.main')

@section('title', 'welcome')

@section('content')

@guest
<!-- Header-->
<header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">Bem vindo ao site de Assistência Técnica.</h1>
                        <p class="fs-4">Para realizar um pedido de Assistência, basta só fazer o registo através de um clique abaixo!</p>
                        <a class="btn btn-primary btn-lg" href="/register" role="button">Registar</a>
                    </div>
                </div>
            </div>
        </header>
        @endguest

        @auth
<!-- Header-->
<header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">Bem vindo ao site de Assistência Técnica.</h1>
                        <p class="fs-4">Para realizar um pedido de Assistência, basta só fazer um clique abaixo!</p>
                        <a class="btn btn-primary btn-lg" href="/criarAssistencia" role="button">Pedir Assistência</a>
                    </div>
                </div>
            </div>
        </header>
        @endauth

<div class="container">
    <div class="row">
        <h4>Publicações:</h4>
    </div>
    <br>
    <div class="row">
        @foreach($publicacao as $publicacao)
        <div class="col-sm-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Título: {{ $publicacao->titulo }}</h5>
                    <p class="card-text">Descrição: {{ $publicacao->texto }}</p>
                    @if($publicacao->imagem != null)
                    <img style="width: 100%" src="img/publicacao/{{ $publicacao->imagem }}" class="card-img-top" alt="...">
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection


        

