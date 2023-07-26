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

                        <!-- Rest of your code -->

                        <form action="/publicacao" method="POST" class="signin-form" enctype="multipart/form-data">
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

                            <!-- Hidden input field to store base64 encoded image -->
                            <input type="hidden" id="imagemBase64" name="imagemBase64">

                            <input type="submit" class="btn btn-primary" value="Criar Publicação">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const imagemInput = document.getElementById('imagem');
    const imagemBase64Input = document.getElementById('imagemBase64');

    imagemInput.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onloadend = function () {
                // Convert the image to base64 and set as the value of the hidden input
                imagemBase64Input.value = reader.result;
            };

            reader.readAsDataURL(file);
        } else {
            imagemBase64Input.value = '';
        }
    });
</script>
@endpush
