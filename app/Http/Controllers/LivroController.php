<?php

namespace Essence\Http\Controllers;

use Essence\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;

class LivroController extends Controller
{
    
    public function index()
    {
        return view('livros.cadastra');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        if (\Input::hasFile('capaLivro')){
            
            $file = \Input::file('capaLivro');
            $extensao = $file->getClientOriginalExtension();
            
            if(($extensao != 'jpg') && ($extensao != 'png')){
                return redirect()->route('livros.index')
                         ->with(['erroImg' => 'Arquivo não suportado!']);
            }else{
                $input = $request->all();
                $capaNova = $input['codigo'].'-'.strtolower(str_replace(" ","", preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"), explode(" ","a A e E i I o O u U n N"), $input['titulo']))).'.png';
                $request->file('capaLivro')->move('images/livros', $capaNova);
                $input['capa'] = $capaNova;
            }
        }else{
            $input = $request->all();
            $input['capa'] = 'padrao.jpg';    
        }
        
        $livro = new Livro();
        $livro->fill($input);
        $livro->save();
        
        return redirect()->route('livros.index')
                         ->with(['success' => 'Livro cadastrado.']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $livros = Livro::find($id);
        return view('livros.edita')->with(compact('livros'));
    }

    public function update(Request $request, $id)
    {

        $nome_capa = Livro::where("id", $id)->first()->capa; 
        if (\Input::hasFile('capaLivro')){
            $file = \Input::file('capaLivro');
            $extensao = $file->getClientOriginalExtension();

            if(($extensao != 'jpg') && ($extensao != 'png')){
                return redirect()->route('livros.index')
                         ->with(['erroImg' => 'Arquivo não suportado!']);
            }else{               
                if($nome_capa != 'padrao.jpg' ){
                    File::delete('images/livros/'.$nome_capa);
                }

                $input = $request->all();
                $capaNova = $input['codigo'].'-'.strtolower(str_replace(" ","", preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"), explode(" ","a A e E i I o O u U n N"), $input['titulo']))).'.png';
                $request->file('capaLivro')->move('images/livros', $capaNova);
                $input['capa'] = $capaNova;
            }
        }else{
            $input = $request->all();
            $input['capa'] = $nome_capa;    
        }

        $livro = Livro::find($id);
        $livro->fill($input);
        $livro->save();
        
        return redirect()->route('livros.edit', $id)
                         ->with(['success' => 'Dados atualizados!']);

    }

    public function deletaBook($id, Request $request)
    {
        $nome_capa = Livro::where("id", $id)->first()->capa; //pegar valor
        
        if($nome_capa != 'padrao.jpg' ){
            File::delete('images/livros/'.$nome_capa);
        }
        $livro = Livro::destroy($id);

        return redirect()->route('livros.index')->with(['livroDelete' => 'Livro removido do banco de dados!']);
    }

    public function showBooks(Request $request)
    {
        $palavra = \Request::get('search');
        $tipo = \Request::get('type');
        $livros = Livro::where($tipo, 'LIKE', '%'.$palavra.'%')->orderBy('id')->paginate(100);
        $totRegistros = $livros->count();
        if($totRegistros > 0){ 
            return view('livros.lista')->with(compact('livros'));
        } else {
            return view('livros.lista')
                ->with(compact('livros'))
                ->with(['resultado' => 'Nenhum registro encontrado!']);
        }
    }
}
