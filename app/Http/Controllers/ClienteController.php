<?php

namespace Essence\Http\Controllers;

use Illuminate\Http\Request;
use Essence\Cliente;
use Essence\Livro;
use Essence\Reserva;
use Essence\Emprestimo;

class ClienteController extends Controller
{
    
    public function index()
    {
        return view('clientes.cadastra');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $cliente = new Cliente();
        $cliente->fill($input);
        $cliente->save();
        
        return redirect()->route('clientes.index')
                         ->with(['success' => 'Informações salvas com sucesso!']);
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $clientes = Cliente::find($id);
        return view('clientes.edita')->with(compact('clientes'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $customer = Cliente::find($id);
        $customer->fill($input);
        $customer->save();

        return redirect()->route('clientes.edit', $id)
                         ->with(['success' => 'Dados atualizados!']);
    }

    public function clientList()
    {
        $clientes = Cliente::paginate(10);
        return view('clientes.lista')->with(compact('clientes'));
    }

    public function clientSearch()
    {
        $palavra = \Request::get('search');
        $tipo = \Request::get('type');
        $clientes = Cliente::where($tipo, 'LIKE', '%'.$palavra.'%')->orderBy('id')->paginate(100);
        return view('clientes.lista')->with(compact('clientes'));
    }

    public function clientDeleta($id)
    {
        $cliente = Cliente::destroy($id);
        $clientes = Cliente::paginate(10);
        return view('clientes.lista')
                ->with(['delete' => 'Usuário deletado!'])
                ->with(compact('clientes'));
    }

    public function trocaStatus($id)
    {
        $dadosCliente = Cliente::find( $id);
        if($dadosCliente->status == 'ativo'){
            $dadosCliente->status = 'desativado';
        }else{
            $dadosCliente->status = 'ativo';
        }

        $dadosCliente->save();
        return redirect()->route('clientes.edit', $id)
                            ->with(['success' => 'Dados atualizados!']);
    }
}
