<?php

namespace Essence\Http\Controllers;

use Illuminate\Http\Request;
use Essence\Livro;
use Essence\Cliente;
use Essence\Emprestimo;
use Essence\Reserva;
use Carbon\Carbon;

class EmprestimoController extends Controller
{
    
    public function index()
    {   
        return view('emprestimos.novo-emprestimo');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
;
        $dadosCliente = CLiente::find(Cliente::where("codigo", $inputs['cod_cliente'])->first()->id);
        $totEmprestimos = Emprestimo::where('cod_cliente', '=', $inputs['cod_cliente'])->count();
        $totReservas = Reserva::where('cod_cliente', '=', $inputs['cod_cliente'])->count();
        $dadosLivros = Livro::find(Livro::where("codigo", $inputs['cod_livro'])->first()->id);
        $dadosReserva = Reserva::find(Reserva::where("cod_cliente", $inputs['cod_cliente'])->first()->id);
        $totClienteReservas = Reserva::where("cod_cliente","=", $inputs['cod_cliente'])->count();
        
        if($totEmprestimos > 3){
            return back()->with('erroReserva', 'O cliente não está liberado para realizar empréstimos, já está no limite de livros!');
        }else{
            if($dadosReserva->cod_livro == $dadosLivros->codigo){
                $reservaDeleta = Reserva::destroy(Reserva::where("cod_cliente", $inputs['cod_cliente'])->first()->id); 
                $totReservas = Reserva::where('cod_cliente', '=', $inputs['cod_cliente'])->count();      
            }
        
            $emprestimos = new Emprestimo();
            $emprestimos->fill($inputs);
            $emprestimos->save();
                
            if($dadosLivros['quantidade'] != 0){
                $novaQtde = $dadosLivros['quantidade']-1;
                $dadosLivros->quantidade = $novaQtde;
                $dadosLivros->save();
            }

            $atual = Carbon::now()->format('d-m-Y H:m:s');
            $devolucao = Carbon::now()->addDays(15)->format('d-m-Y H:m:s');
            $datasEmprestimo = [ 'dataAtual' => $atual, 'dataDevolucao' => $devolucao, 'successEmprestimo' => 'Empréstimo realizado com sucesso.', 'successReserva' => 'Reserva do livro efetuada.', 'totReservas' => $totClienteReservas];

            return view('emprestimos.confirma-emprestimo')->with(compact(['dadosLivros', 'dadosCliente', 'datasEmprestimo']));
        }
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

    public function destroy ($id)
    {
        //
    }

    public function finalizarEmprestimo($codigo, $id)
    {
        $emprestimo = Emprestimo::destroy($id);
        $msg[1] = "1";
        $totEmprestimos = Emprestimo::where('cod_cliente', '=', $codigo)->count();
        
        if($totEmprestimos == 0){
            return redirect()->route('emprestimos.index')->with('reservaNaoEncontrada', 'Cliente não realizou nenhum empréstimo.')->with('idBusca',  $codigo);
        }else{
            $dadosEmprestimo = Emprestimo::where('cod_cliente', 'LIKE', '%'.$codigo.'%')->orderBy('id')->get();
            $dadosClientes = Cliente::find(Cliente::where("codigo", $codigo)->first()->id);
                
            $c = 0;$totalDias = 0;
            $hoje = Carbon::now();
            foreach($dadosEmprestimo as $emprestimo){
                $livro = Livro::find(Livro::where("codigo", $emprestimo->cod_livro)->first()->id);
                $dadosLivros[$c] = $livro;
                    
                //VERIFICAR SE O LIVRO ESTÁ EM ATRASO
                $dt_entrega = Carbon::parse($dadosEmprestimo[$c]->dt_entrega);
                $dt_emprestimo = Carbon::parse($dadosEmprestimo[$c]->dt_emprestimo);
                $totDias = $dt_emprestimo->diffInDays($hoje);
                if($totDias <= 14){
                    $multa[$c] = "";
                }else{
                    $totDiasUltrapassados = $dt_entrega->diffInDays($hoje);
                    $totalDias = $totalDias + $totDiasUltrapassados;
                    $multa[25] = $totalDias;
                    $multa[$c] =  "Dias ultrapassados : ".$totDiasUltrapassados;
                    $multa[$c+3] = "Valor da multa : ".$totDiasUltrapassados*0.50 ." reais/centavos.";
                }
                $c++;
            }
            return view('emprestimos.detalhar')->with(compact(['dadosClientes', 'dadosLivros', 'dadosEmprestimo', 'multa', 'msg']));
        }
    }

    public function renovarEmprestimo($codigo, $id)
    {

        $emprestimo = Emprestimo::find($id);
        $atual = Carbon::now()->format('d-m-Y H:m:s');
        $devolucao = Carbon::now()->addDays(15)->format('d-m-Y H:m:s');
        $emprestimo->dt_emprestimo = $atual;
        $emprestimo->dt_entrega = $devolucao;
        $emprestimo->save();
        $msg[1] = "2";

        $emprestimo = Emprestimo::find($id);
        $totEmprestimos = Emprestimo::where('cod_cliente', '=', $codigo)->count();

        $dadosEmprestimo = Emprestimo::where('cod_cliente', 'LIKE', '%'.$codigo.'%')->orderBy('id')->get();
        $dadosClientes = Cliente::find(Cliente::where("codigo", $codigo)->first()->id);
            
        $c = 0;$totalDias = 0;
        $hoje = Carbon::now();
        foreach($dadosEmprestimo as $emprestimo){
            $livro = Livro::find(Livro::where("codigo", $emprestimo->cod_livro)->first()->id);
            $dadosLivros[$c] = $livro;
                
            //VERIFICAR SE O LIVRO ESTÁ EM ATRASO
            $dt_entrega = Carbon::parse($dadosEmprestimo[$c]->dt_entrega);
            $dt_emprestimo = Carbon::parse($dadosEmprestimo[$c]->dt_emprestimo);
            $totDias = $dt_emprestimo->diffInDays($hoje);
            if($totDias <= 14){
                $multa[$c] = "";
            }else{
                $totDiasUltrapassados = $dt_entrega->diffInDays($hoje);
                $totalDias = $totalDias + $totDiasUltrapassados;
                $multa[25] = $totalDias;
                $multa[$c] =  "Dias ultrapassados : ".$totDiasUltrapassados;
                $multa[$c+3] = "Valor da multa : ".$totDiasUltrapassados*0.50 ." reais/centavos.";
            }
            $c++;
        }
        return view('emprestimos.detalhar')->with(compact(['dadosClientes', 'dadosLivros', 'dadosEmprestimo', 'multa', 'msg']));
    }

    public function confirmEmprestimo(Request $request)
    {
        $idsCL = $request->all();
        $totEmprestimos = Emprestimo::where('cod_cliente', '=', $idsCL['codCliente'])->count();
        $totReservas = Reserva::where('cod_cliente', '=', $idsCL['codCliente'])->count();
        $totCliente = Cliente::where('codigo', '=', $idsCL['codCliente'])->count(); 
        $totLivro = Livro::where('codigo', '=', $idsCL['codLivro'])->count();   
        $totClienteReservas = Reserva::where("cod_cliente","=", $idsCL['codCliente'])->count();

        if($totEmprestimos > 3){
            return back()->with('erroReserva', 'O cliente não está liberado para realizar empréstimos, já está no limite de livros!')->with('codCliente',  $idsCL['codCliente'])->with('codLivro',  $idsCL['codLivro']);
        }else{
            if($totCliente > 0){
                if($totLivro > 0){
                    $dadosCliente = Cliente::find(Cliente::where("codigo", $idsCL['codCliente'])->first()->id);
                    $dadosLivros = Livro::find(Livro::where("codigo", $idsCL['codLivro'])->first()->id);
                    $atual = Carbon::now()->format('d-m-Y H:m:s');
                    $devolucao = Carbon::now()->addDays(15)->format('d-m-Y H:m:s');
                    $datasEmprestimo = [ 'dataAtual' => $atual, 'dataDevolucao' => $devolucao, 'successEmprestimo' => 'false', 'successReserva' => 'false', 'totReservas' => $totClienteReservas];

                    return view('emprestimos.confirma-emprestimo')->with(compact(['dadosLivros', 'dadosCliente', 'datasEmprestimo']));
                }else{
                    return back()
                        ->with('erroReserva', 'Código do livro não localizado.')
                        ->with('codCliente',  $idsCL['codCliente'])
                        ->with('codLivro',  $idsCL['codLivro']);
                }
            }else{
                return back()
                        ->with('erroReserva', 'Cliente não registrado.')
                        ->with('codCliente', $idsCL['codCliente'])
                        ->with('codLivro', $idsCL['codLivro']);
            }
        }
    }

    public function detalharEmprestimo(Request $request)
    {
        $inputs = $request->all();
        $totEmprestimos = Emprestimo::where('cod_cliente', '=', $inputs['idBusca'])->count();

        if($totEmprestimos == 0){
            return back()->with('reservaNaoEncontrada', 'Cliente não realizou nenhum empréstimo.')
                        ->with('idBusca',  $inputs['idBusca']);
        }else{
            $dadosEmprestimo = Emprestimo::where('cod_cliente', 'LIKE', '%'.$inputs['idBusca'].'%')->orderBy('id')->get();
            $dadosClientes = Cliente::find(Cliente::where("codigo", $inputs['idBusca'])->first()->id);
            
            $c = 0;$totalDias = 0;
			$hoje = Carbon::now();
			foreach($dadosEmprestimo as $emprestimo){
                $livro = Livro::find(Livro::where("codigo", $emprestimo->cod_livro)->first()->id);
                $dadosLivros[$c] = $livro;
				
				//VERIFICAR SE O LIVRO ESTÁ EM ATRASO
				$dt_entrega = Carbon::parse($dadosEmprestimo[$c]->dt_entrega);
				$dt_emprestimo = Carbon::parse($dadosEmprestimo[$c]->dt_emprestimo);
				$totDias = $dt_emprestimo->diffInDays($hoje);
				if($totDias <= 14){
					$multa[$c] = "";
				}else{
					$totDiasUltrapassados = $dt_entrega->diffInDays($hoje);
                    $totalDias = $totalDias + $totDiasUltrapassados;
                    $multa[25] = $totalDias;
					$multa[$c] =  "Dias ultrapassados : ".$totDiasUltrapassados;
                    $multa[$c+3] = "Valor da multa : ".$totDiasUltrapassados*0.50 ." reais/centavos.";
				}
                $c++;
            }
            return view('emprestimos.detalhar')->with(compact(['dadosClientes', 'dadosLivros', 'dadosEmprestimo', 'multa']));
        }
    }
}
