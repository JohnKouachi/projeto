<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\publicacao;

use App\models\assistencia;
use App\models\User;

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
        $assistencia->texto = $request->texto;
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
        
        return redirect('/assistencia')->with('msg','Pedido apagado!');

    }

    

    public function dashboard(){
        $user = auth()->user();

        $assistencia = $user->assistencias;

        $publicacao = publicacao::all();

        $assistenciaAll = assistencia::all();
        


        return view('/dashboard',['assistencia' => $assistencia,'publicacao'=>$publicacao,'assistencias' => $assistenciaAll]);
    }


    public function assistEdit($id){
        $assistencia=assistencia::findOrFail($id);

        return view('/assistenciaUpdate',['assistencia' => $assistencia]);


    }

    public function assistUpdate(Request $request){
        $assistencia=assistencia::findOrFail($request -> id)->update($request->all());

        return redirect('/assistencia')->with('msg','Pedido Editado!');


    }
   



    

}
