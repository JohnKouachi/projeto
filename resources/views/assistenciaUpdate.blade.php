@extends('layouts.main')

@section('title', 'Upadate')

@section('content')
        

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">Alterando: {{$assistencia->titulo}}</h3>

                            <form action="/assistencia/update/{{ $assistencia -> id}}" method="POST" class="signin-form">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Titulo:</label>
                                    <input type="text" id="titulo" class="form-control" placeholder="Titulo" name="titulo" value="{{ $assistencia -> titulo}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descrição:</label>
                                    <input type="text" id="descricao" class="form-control" placeholder="Descrição" name="descricao" value="{{ $assistencia -> descricao }}"required>
                                </div>
                            

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Estado:</label>
                                    <select id="estado" class="form-control" name="estado" required>
                                        <option value="Pendente" {{ $assistencia->estado == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                                        <option value="Aceite" {{ $assistencia->estado == 'Aceite' ? 'selected' : '' }}>Aceite</option>
                                        <option value="Resolvido" {{ $assistencia->estado == 'Resolvido' ? 'selected' : '' }}>Resolvido</option>
                                    </select>
                                </div>
                                 <br>
                                       <input  type="submit" class=" btn btn-primary" value="Editar Evento">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
