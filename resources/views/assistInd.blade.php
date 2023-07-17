@extends('layouts.main')

@section('title', 'welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div style="margin-top: 100px;">
                <h1>Título: {{ $assistencia->titulo }}</h1>
                <p>Descrição: {{ $assistencia->texto }}</p>
                <p>Estado: {{ $assistencia->estado }}</p>
                <p>Pedido por: {{ $assistenciaDono['name'] }}</p>
                <a class="btn btn-primary" href="#" role="button">Aceitar Pedido</a>
            </div>
        </div>
    </div>
</div>
@endsection

