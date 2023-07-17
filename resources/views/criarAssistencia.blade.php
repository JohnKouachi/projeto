@extends('layouts.main')

@section('title', 'Pedido Assistência')

@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Criar Pedido de Assistência</h6>
                </div>
                
                <div class="card-body">
                    <div id="publicacao-create-container" class="col-md-6 offset-md-3 ">
                        
                        <div id="ContainerMensagens"></div>
                        
                        <script>
                        const containerMensagens = $('#ContainerMensagens'); // Container para mensagens
                        </script>

                        @if(session('mensagem_sucesso_pagina_criar_assistencia'))
                        <script>
                        const sucessoMensagem = '{{ session('mensagem_sucesso_pagina_criar_assistencia') }}';
                        const sucessoContainer = createAlertContainer(sucessoMensagem, 'success');
                        containerMensagens.empty().append(sucessoContainer);
                        </script>
                        @endif

                        @if(session('mensagem_erro_pagina_criar_assistencia'))
                        <script>
                        const erroMensagem = '{{ session('mensagem_erro_pagina_criar_assistencia') }}';
                        const erroContainer = createAlertContainer(erroMensagem, 'danger');
                        containerMensagens.empty().append(erroContainer);
                        </script>
                        @endif

                        @if($errors->any())
                        <script>
                        const errorMessages = [
                            @foreach($errors->all() as $ErroCriarAssistencia)
                            '{{ $ErroCriarAssistencia }}',
                            @endforeach
                        ];
                        const errorContainer = createAlertContainer(errorMessages, 'danger');
                        containerMensagens.empty().append(errorContainer);
                        </script>
                        @endif
                                    
                        

                            <form action="/Gassistencia" method="POST" class="signin-form">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Titulo:</label>
                                    <input type="text" id="titulo" class="form-control" placeholder="Titulo" name="titulo" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Breve descrição:</label>
                                    <input type="text" id="descricao" class="form-control" placeholder="Descrição" name="descricao" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descrição do problema:</label>
                                    <textarea class="form-control" id="texto" name="texto" rows="3"></textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Estado</label>
                                    <input type="text" id="estado" class="form-control" placeholder="Estado" name="estado" required>
                                </div>
                                <br>
                                <input  type="submit" class=" btn btn-primary" value="Criar Pedido">
                                
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
