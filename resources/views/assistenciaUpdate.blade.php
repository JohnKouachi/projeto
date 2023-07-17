@extends('layouts.main')

@section('title', 'Upadate')

@section('content')
        

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">Edite o pedido de assistencia</h3>

                            <form action="/assistencia/update/{{ $assistencia -> id}}" method="POST" class="signin-form">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Titulo</label>
                                    <input type="text" id="titulo" class="form-control" placeholder="Titulo" name="titulo" value="{{ $assistencia -> titulo}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Breve descrição</label>
                                    <input type="text" id="descricao" class="form-control" placeholder="Descrição" name="descricao" value="{{ $assistencia -> descricao }}"required>
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Texto</label>
                                    <textarea class="form-control" id="texto" placeholder="Texto" name="texto" rows="3" >{{ $assistencia -> texto }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Estado</label>
                                    <input type="text" id="estado" class="form-control" placeholder="Estado" name="estado" value="{{ $assistencia -> estado}}"required>
                                </div>
                
                                
                                <input  type="submit" class=" btn btn-primary" value="Editar Evento">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
