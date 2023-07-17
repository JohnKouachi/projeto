@extends('layouts.main')

@section('title', 'welcome')

@section('content')
        

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">pagina quem somos</h3>

                            <form action="/" method="POST" class="signin-form">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Quem somos</label>
                                    <input type="text" id="titulo" class="form-control" placeholder="Titulo" name="titulo" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">O que fazemos</label>
                                    <input type="text" id="descricao" class="form-control" placeholder="Descrição" name="descricao" required>
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Onde estamos</label>
                                    <textarea class="form-control" id="texto" name="texto" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">E-mail</label>
                                    <textarea class="form-control" id="texto" name="texto" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Numero de telemovel</label>
                                    <textarea class="form-control" id="texto" name="texto" rows="3"></textarea>
                                </div>
                                
                
                                
                                <input  type="submit" class=" btn btn-primary" value="Criar Evento">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
