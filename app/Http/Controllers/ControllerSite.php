<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\models\publicacao;

use App\models\assistencia;
use App\models\User;
use App\Models\UserType;


class ControllerSite extends Controller
{
    public function cp(){
        return view('criarPublicacao');
        
    }

    public function welcome(){

        $publicacao = publicacao::all();
        return view('welcome',['publicacao' => $publicacao]);
    }
        
    public function store(Request $request) {

        $publicacao = new publicacao;
        
        $publicacao->titulo = $request->titulo;
        $publicacao->texto = $request->texto;
       
        $user = auth()->user();
        $publicacao->user_id = $user->id;

        

         // Imagem
         if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImage = $request->imagem;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/publicacao'), $nomeImagem);
            $event->imagem = $nomeImagem;
        }

        try {
        
            $publicacao->save();
        
            return redirect()->back()->with('mensagem_sucesso_pagina_criar_publicacao', 'Publicação criada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('mensagem_erro_pagina_criar_publicacao', 'Falha na criação da publicação!');
        }

        

       
        
    }
        

    public function publicacaoDelelte($id){

        $publicacao=publicacao::findOrFail($id)->delete();
        
        return redirect('/dashboard')->with('msg','Publicação apagada!');

    }

    public function publicacaoEdit($id){
        $publicacao=publicacao::findOrFail($id);

        return view('/publicacaoUpdate',['publicacao' => $publicacao]);


    }

    public function publicacaoUpdate(Request $request){
        $publicacao=publicacao::findOrFail($request -> id)->update($request->all());

        return redirect('/')->with('msg','Pedido Editado!');


    }

    public function assist(){
        $assistencia = assistencia::all();
        return view('assistencia',['assistencia' => $assistencia]);
        
        
    }

    public function Passist(){
        return view('criarAssistencia');
        
    }

    public function Gassist(Request $request){
        $assistencia = new assistencia;
        
        $assistencia->titulo = $request->titulo;
        $assistencia->descricao = $request->descricao;
        $assistencia->estado = $request->estado;

        $user = auth()->user();
        $assistencia->user_id = $user->id;
 
      

        try {
        
            $assistencia->save();
        
            return redirect()->back()->with('mensagem_sucesso_pagina_criar_assistencia', 'Assistência criada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('mensagem_erro_pagina_criar_assistencia', 'Falha na criação da publicação!');
        }

     
        
    }

    public function assistInd($id){
        $assistencia=assistencia::findOrFail($id);

        $assistenciaDono= User::where('id',$assistencia->user_id)->first()->toArray();
        
        return view('/assistInd',['assistencia' => $assistencia,'assistenciaDono'=>$assistenciaDono]);

    }
    
    public function assistDel($id){
        $assistencia=assistencia::findOrFail($id)->delete();
        
        return redirect('/dashboard')->with('msg','Pedido apagado!');

    }

    

    public function dashboard()
    {
        $user = auth()->user();
    
        $assistencia = $user->assistencias;
    
        $publicacao = publicacao::all();
    
        $assistenciaAll = assistencia::all();
    
        $users = User::select('id', 'name', 'email', 'user_type_id')->get();
    
        $userTypeOptions = UserType::pluck('name', 'id')->toArray();
    
        return view('dashboard', [
            'assistencia' => $assistencia,
            'publicacao' => $publicacao,
            'assistencias' => $assistenciaAll,
            'users' => $users,
            'userTypeOptions' => $userTypeOptions,
        ]);
    }

    public function assistEdit($id){
        $assistencia=assistencia::findOrFail($id);

        return view('/assistenciaUpdate',['assistencia' => $assistencia]);


    }

    public function assistUpdate(Request $request){
        $assistencia=assistencia::findOrFail($request -> id)->update($request->all());

        return redirect('/assistencia')->with('msg','Pedido Editado!');


    }
   
    public function updateUserType(Request $request, $userId)
    {
        $request->validate([
            'user_type_id' => 'required|exists:user_types,id',
        ]);
    
        $user = User::findOrFail($userId);
        $user->user_type_id = $request->user_type_id;
        $user->save();
    
        return back()->with('success', 'User type updated successfully.');
    }

    public function updateAssistencia(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:aceitar,recusar,resolvido',
        ]);
    
        $estadoMap = [
            'aceitar' => 'aceite',
            'recusar' => 'recusado',
            'resolvido' => 'resolvido',
        ];
    
        $assistencia = Assistencia::findOrFail($id);
        $estado = $request->input('estado');
    
        // Check if the estado is a valid key in the estadoMap
        if (array_key_exists($estado, $estadoMap)) {
            $assistencia->estado = $estadoMap[$estado];
            $assistencia->save();
    
            // Redirect back to the page with a success message
            return back()->with('success', 'Assistencia atualizada com sucesso.');
        }
    
        // If the estado is not valid, redirect back with an error message
        return back()->with('error', 'Ação inválida.');
    }

    public function quemSomos(){

        return view('/quemSomos');
    }



    //ADMIN

    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'user_type_id' => 'required|integer|between:1,3', // Ensure the user_type_id is within the specified range (1 to 3)
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type_id' => $request->user_type_id,
        ]);

        $user->save();

        return redirect('/dashboard')->with('success', 'User registered successfully!');
    }

}
