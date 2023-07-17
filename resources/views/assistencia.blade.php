@extends('layouts.main')

@section('title', 'Pedidos de assistencia')

@section('content')


  
        
        <div class="container">
         
        <h1>Pedidos de Assistência:</h1>
        <br>
        <br>

            <div class="row">

            @foreach($assistencia as $assistencia)
            
            <div  class="card" style="width: 25rem;">            
                    <div class="card-body">
                        <h5 class="card-title"> {{ $assistencia -> titulo }}</h5>
                        <p class="card-text">{{ $assistencia -> descricao }}</p>
                        <p class="card-text">Estado: {{ $assistencia -> estado }}</p>
                        <a href="/assistencia/{{ $assistencia -> id }}" class="btn btn-primary">ver pedido </a>
                        
                        <form action="/assistencia/{{$assistencia -> id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary bg-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>                      
                        </form>
                    </div>
                </div>
           
             
            @endforeach

                
            </div>

        </div>


        
@endsection