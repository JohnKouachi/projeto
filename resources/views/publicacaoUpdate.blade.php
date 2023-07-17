@extends('layouts.main')

@section('title', 'welcome')

@section('content')
        

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">Editar publicação</h3>

                            <form action="/publicacao/update/{{$publicacao-> id}}" method="POST" class="signin-form">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Titulo</label>
                                    <input type="text" id="titulo" class="form-control" placeholder="titulo" name="titulo" value="{{ $publicacao -> titulo}}" required>
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Texto</label>
                                    <textarea class="form-control" id="texto" name="texto" rows="3" >{{ $publicacao -> texto}}</textarea>
                                </div>
                
                                <div class="form-group">
                                    <label for="image">Imagem do artigo</label>
                                    <input type="file" class="form-control-file" id="imagem" name="imagem">
                                </div>

                                

                                <input  type="submit" class=" btn btn-primary" value="Editar Evento">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection