
@extends('main')

@section ('page-title', 'Confirmar Empréstimo de Livro')

@section('body-content')

	@include('emprestimos.header')

	<section>
    	<div class="container">
    		@if($datasEmprestimo['successEmprestimo'] != 'false')
        		<div class="alert alert-success">
        			Empréstimo realizado com sucesso.
        		</div>
        	
        	@elseif ($datasEmprestimo['successReserva'] != 'false')
        	 	<div class="alert alert-success">
        	 		Reserva do livro efetuada
        		</div>	
        	
        	@endif
        	<div class="row pad-row">
        		<h3>Confirmação do Empréstimo</h3>
        		<hr>
				<div class="col-md-3">
					<p><b>Cliente : </b> {{ $dadosCliente->nome }}</p>
					<p><b>Endereço : </b> {{ $dadosCliente->endereco }}</p>
					<p><b>Telefone : </b> {{ $dadosCliente->telefone }}</p>
					<p><b>Email : </b> {{ $dadosCliente->email }}</p>
					<br><hr><br>
					<p><b>Data do Empréstimo : </b> <br>{{ $datasEmprestimo['dataAtual'] }}</p>
					<p><b>Data da Devolução : </b> <br>{{ $datasEmprestimo['dataDevolucao'] }}</p>
				</div>
				<div class="col-md-5">
					<p><b>Livro : </b> {{ $dadosLivros->titulo }}</p>
					<p><b>Autores : </b> {{ $dadosLivros->autores }}</p>
					<p><b>Descrição : </b> {{ $dadosLivros->descricao }}</p>
				</div>
				<div class="col-md-4">
					<img src="/images/livros/{{$dadosLivros->capa}}" width="300">
				</div>
			</div>
			<div class="container">
				<div class="row text-center pad-row">
					<div class="col-md-6">
						{!! Form::open(['route' => 'emprestimos.store', 'method' => 'post']) !!}				
							<input type="hidden" value="{{ $dadosCliente->codigo }}" name="cod_cliente">
							<input type="hidden" value="{{ $dadosLivros->codigo }}" name="cod_livro">
							<input type="hidden" value="{{ $datasEmprestimo['dataAtual'] }}" name="dt_emprestimo">
							<input type="hidden" value="{{ $datasEmprestimo['dataDevolucao'] }}" name="dt_entrega">
							<input type="hidden" value="0.00" name="multa">
							<button type="submit" class="btn btn-info @if($dadosLivros->quantidade == 0) disabled @endif">Confirmar Empréstimo</button><br>
							@if($dadosLivros->quantidade == 0) 
								<small style="padding:10px; color:red; font-size: 13px;">
									Não há mais livros disponíveis para empréstimos.<br>
									Faça uma reserva do livro para o cliente.</small>
							@endif
						{!! Form::close() !!}	
					</div>
					<div class="col-md-6">
						{!! Form::open(['route' => 'reservas.store', 'method' => 'post']) !!}
							<input type="hidden" value="{{ $dadosLivros->codigo }}" name="cod_livro">
							<input type="hidden" value="{{ $dadosCliente->codigo }}" name="cod_cliente">
							<input type="hidden" value="{{ mt_rand() }}" name="cod_reserva">
							<button type="submit" class="btn btn-danger @if($datasEmprestimo['totReservas'] > 1) disabled @endif">Reservar Livro</button><br>
							@if($datasEmprestimo['totReservas'] > 1) 
								<small style="padding:10px; color:red; font-size: 13px;">
									O cliente não está liberado para reservar o livro.<br>
									O mesmo já possui um livro reservado.</small>
							@else
								<p><b>Código de Registro da reserva : </b>{{ mt_rand() }}</p>
							@endif
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</section>
@stop