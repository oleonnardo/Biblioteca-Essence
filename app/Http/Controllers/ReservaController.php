<?php

namespace Essence\Http\Controllers;

use Illuminate\Http\Request;
use Essence\Livro;
use Essence\Cliente;
use Essence\Reserva;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ReservaController extends Controller
{
    
    public function index()
    {   
        return view('reservas.nova-reserva');
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {

        $inputs = $request->all();
        $reserva = new Reserva();
        $reserva->fill($inputs);
        $reserva->save();

        $totReservas = Reserva::where('cod_cliente', '=', $inputs['cod_cliente'])->count();
        $dadosCliente = CLiente::find(Cliente::where("codigo", $inputs['cod_cliente'])->first()->id);
        $dadosLivros = Livro::find(Livro::where("codigo", $inputs['cod_livro'])->first()->id);
        $totClienteReservas = Reserva::where("cod_cliente","=", $inputs['cod_cliente'])->count();
        
        if($dadosLivros['quantidade'] != 0){
            $novaQtde = $dadosLivros['quantidade']-1;
            $dadosLivros->quantidade = $novaQtde;
            $dadosLivros->save();
        }

        $atual = Carbon::now()->format('d/m/Y H:m:s');
        $devolucao = Carbon::now()->addDays(15)->format('d/m/Y H:m:s');
        $datasEmprestimo = [ 'dataAtual' => $atual, 'dataDevolucao' => $devolucao, 'successEmprestimo' => 'Empréstimo realizado com sucesso.', 'successReserva' => 'Reserva do livro efetuada.', 'totReservas' => $totClienteReservas];

        return view('emprestimos.confirma-emprestimo')->with(compact(['dadosLivros', 'dadosCliente', 'datasEmprestimo']));
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function novaReserva($id){
        $codigo = Livro::where("id", $id)->first()->codigo;
        return redirect()->route('reservas.index')->with('codLivro',  $codigo);
    }

    public function localizarReserva(Request $request)
    {
        $inputs = $request->all();
        $totReservas = Reserva::where("cod_reserva","=", $inputs['idBusca'])->count();
        if($totReservas == 0){
            return back()->with('reservaNaoEncontrada', 'Registro não localizado.')
                        ->with('idBusca',  $inputs['idBusca']);
        }else{
            $dadosReservas = Reserva::find(Reserva::where("cod_reserva", $inputs['idBusca'])->first()->id);

            $totCliente = Cliente::where("codigo","=", $dadosReservas['cod_cliente'])->count();
            $totClienteReservas = Reserva::where("cod_cliente","=", $dadosReservas['cod_cliente'])->count();
            $totLivro = Livro::where("codigo","=", $dadosReservas['cod_livro'])->count();
            if($totCliente == 0 && $totLivro == 0){
                return back()->with('reservaNaoEncontrada', 'Cliente e Livro não foram localizados no sistema.
                    Faça sua busca novamente..')->with('idBusca',  $inputs['idBusca']);

            }else if($totCliente == 0){
                return back()->with('reservaNaoEncontrada', 'Cliente não localizado no sistema.
                    Verifique se há um cadastro ativo do cliente.')->with('idBusca',  $inputs['idBusca']);

            }else if($totLivro == 0){
                return back()->with('reservaNaoEncontrada', 'Livro não localizado.
                    Verifique se o livro está cadastrado no sistema.')->with('idBusca',  $inputs['idBusca']);

            }else{
                $dadosCliente = Cliente::find(Cliente::where("codigo", $dadosReservas['cod_cliente'])->first()->id);
                $dadosLivros = Livro::find(Livro::where("codigo", $dadosReservas['cod_livro'])->first()->id);
                $atual = Carbon::now()->format('d/m/Y H:m:s');
                $devolucao = Carbon::now()->addDays(15)->format('d/m/Y H:m:s');
                $datasEmprestimo = [ 'dataAtual' => $atual, 'dataDevolucao' => $devolucao, 'successEmprestimo' => 'false', 'successReserva' => 'false', 'totReservas' => $totClienteReservas];

                return view('emprestimos.confirma-emprestimo')->with(compact(['dadosLivros', 'dadosCliente', 'datasEmprestimo']));dd($dadosReservas);
            }
        }
    }
}
