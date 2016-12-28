@extends('main')

@section ('page-title', 'Empréstimo de Livros')

@section('body-content')

	@include('emprestimos.header')

	<section>
    	<div class="container">
        	<div class="row text-center pad-row">
				<div class="col-md-6">
					<h4>Procurar Dados<br>
					<small>Insira o código do cliente  e o código do livro para realizar o empréstimo.</small></h4>
					{!! Form::open(['route' => 'confirmarEmprestimo', 'method' => 'post']) !!}					
						@include('reservas.form-busca')	
					{!! Form::close() !!}		
				</div>
				<div class="col-md-6">
					<h4>Localizar Empréstimo<br>
					<small>Insira o código do cliente para localizar os empréstimos.</small></h4>
					{!! Form::open(['route' => 'detalharEmprestimo', 'method' => 'post']) !!}	
						@include('reservas.localizar')	
					{!! Form::close() !!}	
				</div>
			</div>
		</div>
	</section>

@stop