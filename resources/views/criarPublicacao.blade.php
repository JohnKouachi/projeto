@extends('layouts.main')

@section('title', 'Criar Publicação')

@section('content')

    <div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Criar Publicação</h6>
                </div>
                
                <div class="card-body">
                    <div id="publicacao-create-container" class="col-md-6 offset-md-3 ">
                        
                        <div id="ContainerMensagens"></div>
                        
                        <script>
                        const containerMensagens = $('#ContainerMensagens'); // Container para mensagens
                        </script>

                        @if(session('mensagem_sucesso_pagina_criar_publicacao'))
                        <script>
                        const sucessoMensagem = '{{ session('mensagem_sucesso_pagina_criar_publicacao') }}';
                        const sucessoContainer = createAlertContainer(sucessoMensagem, 'success');
                        containerMensagens.empty().append(sucessoContainer);
                        </script>
                        @endif

                        @if(session('mensagem_erro_pagina_criar_publicacao'))
                        <script>
                        const erroMensagem = '{{ session('mensagem_erro_pagina_criar_publicacao') }}';
                        const erroContainer = createAlertContainer(erroMensagem, 'danger');
                        containerMensagens.empty().append(erroContainer);
                        </script>
                        @endif

                        @if($errors->any())
                        <script>
                        const errorMessages = [
                            @foreach($errors->all() as $ErroCriarPublicacao)
                            '{{ $ErroCriarPublicacao }}',
                            @endforeach
                        ];
                        const errorContainer = createAlertContainer(errorMessages, 'danger');
                        containerMensagens.empty().append(errorContainer);
                        </script>
                        @endif
                                    
                        <form action="/publicacao" method="POST" class="signin-form">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Titulo</label>
                            <input type="text" id="titulo" class="form-control" placeholder="titulo" name="titulo" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Texto</label>
                            <textarea class="form-control" id="texto" name="texto" rows="3"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image">Imagem do artigo</label>
                            <input type="file" class="form-control-file" id="imagem" name="imagem">
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Criar Publicação">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection