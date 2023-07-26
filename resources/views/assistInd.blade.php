@extends('layouts.main')

@section('title', 'welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div style="margin-top: 100px;">
                <h1>Título: {{ $assistencia->titulo }}</h1>
                <p>Descrição: {{ $assistencia->descricao }}</p>
                <p>Estado: {{ $assistencia->estado }}</p>
                <p>Pedido por: {{ $assistenciaDono['name'] }}</p>
                @if (auth()->check() && (auth()->user()->user_type_id === 1 || auth()->user()->user_type_id === 3))
                    @if ($assistencia->estado != 'resolvido')
                        @if ($assistencia->estado != 'recusado')
                            <form action="/assistencia/update/{{ $assistencia->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary" name="estado" value="aceite">Aceitar</button>
                            </form>
                            <br>
                            <form action="/assistencia/update/{{ $assistencia->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger" name="estado" value="recusado">Recusar</button>
                            </form>
                            <br>
                            @if ($assistencia->estado === 'aceite')
                                <form action="/assistencia/update/{{ $assistencia->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success" name="estado" value="resolvido">Resolvido</button>
                                </form>
                            @endif
                        @endif
                    @else
                        
                    @endif

                @endif
                @if (auth()->check() && (auth()->user()->user_type_id === 1))
                <h1>Menu admin</h1>
                    <form action="/assistencia/update/{{ $assistencia->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary" name="estado" value="aceite">Aceitar</button>
                    </form>
                    <br>
                    <form action="/assistencia/update/{{ $assistencia->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger" name="estado" value="recusado">Recusar</button>
                    </form>     
                    <br>  
                    <form action="/assistencia/update/{{ $assistencia->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success" name="estado" value="resolvido">Resolvido</button>
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

