@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
       

        
        <div class="col-md-10 offset-md-1 dashboard-tittle-container">
        @if (auth()->check() && auth()->user()->user_type_id === 1)
            <h1>Dashboard Admin</h1>
            <br>

            <h1>Usuários</h1>
                @if(!is_null($users) && count($users) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tipo de Usuário</th>
                                    <th scope="col">Alterar Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->userType)
                                                {{ $user->userType->name }}
                                            @else
                                                No User Type
                                            @endif
                                        </td>
                                        <td>
                                        <form action="/users/{{ $user->id }}/update-type" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group">
                                                <select class="form-select" name="user_type_id">
                                                    @foreach ($userTypeOptions as $value => $label)
                                                        <option value="{{ $value }}" {{ optional($user->userType)->id == $value ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Não existem usuários cadastrados.</p>
                    @endif
            @endif
            @if (auth()->check() && (auth()->user()->user_type_id === 1 || auth()->user()->user_type_id === 3))
            <h1>Publicações</h1>
           
            @if(count($publicacao) > 0)
                         
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">Texto</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Apagar</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($publicacao as $publicacao)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $publicacao -> titulo }}</td>
                            <td>{{ $publicacao -> texto }}</td>
                            <td>
                            Publidado por:
                            @php
                            $userName = \App\Models\User::where('id', $publicacao->user_id)->value('name');
                            @endphp
                            {{ $userName }}

                            </td>
                            <td> 
                            <form action="/publicacao/{{$publicacao -> id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary bg-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>                      
                        </form>
                            </td>
                            <td>
                                
                                                            
                                    <a class="btn btn btn-warning" href="/publicacao/edit/{{$publicacao-> id}}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a> 

                                
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
                
                          
            @else
                <p> não existe publicações </p>
            @endif           

        </div>
        
        <div class="col-md-10 offset-md-1 ">
       
                        
       <h1>Pedidos de assistencia</h1>

   <table class="table">
       <thead>
           <tr>
               <th scope="col">#</th>
               <th scope="col">Ttulo</th>
               <th scope="col">Descrição</th>
               <th scope="col">Autor</th>
               <th scope="col"></th>
               <th scope="col">Apagar</th>
               <th scope="col">Editar</th>
           </tr>
       </thead>
       <tbody>
       @foreach($assistencias as $assistencias)
           <tr>
               <th scope="row">{{ $loop->index + 1 }}</th>
               <td>{{ $assistencias -> titulo }}</td>
               <td>{{ $assistencias -> descricao }}</td>
               <td>Pedido por: 


               @php
                            $userName = \App\Models\User::where('id', $publicacao->user_id)->value('name');
                            @endphp
                            {{ $userName }}

               </td>
               <td> 
               <a href="/assistencia/{{ $assistencias -> id }}" class="btn btn-primary">Ver Detalhes </a>
               </td>
               <td> 
               <form action="/assistencia/{{$assistencias -> id}}" method="POST">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-primary bg-danger">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                       <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                       <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                   </svg>
               </button>                      
           </form>
               </td>
               <td>                         
                 <a class="btn btn btn-warning" href="/assistencia/edit/{{$assistencias ->id}}" >
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                               <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                               <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                           </svg>
                       </a> 

                   
               </td>
           </tr>
           @endforeach  
       </tbody>
   </table>
                    
      </div>              
                  

       </div>
       @endif  

        
       @if (auth()->check() && auth()->user()->user_type_id === 2)
       <div class="col-md-10 offset-md-1 dashboard-tittle-container">
    <h1>Meus pedidos de assistencia</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($assistencia) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Estado</th>
                <th scope="col">Autor</th>
                <th scope="col"></th>
                <th scope="col">Excluir</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assistencia as $itemAssistencia)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $itemAssistencia->titulo }}</td>
                <td>{{ $itemAssistencia->descricao }}</td>
                <td>{{ $itemAssistencia->estado }}</td>
                <td>Pedido por: {{ $itemAssistencia->user->name ?? 'Usuário não encontrado' }}</td>
                <td>
                    <a href="/assistencia/{{ $itemAssistencia->id }}" class="btn btn-primary">Ver Detalhes</a>
                </td>
                <td>
                    <form action="/assistencia/{{$itemAssistencia->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary bg-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                       <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                       <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                   </svg>
                        </button>
                    </form>
                </td>
                <td>
                    <a class="btn btn btn-warning" href="/assistencia/edit/{{$itemAssistencia->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                               <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                               <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                           </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Não tem pedidos </p>
    @endif
</div>


@endif


        
@endsection
