@extends('main')

@section ('page-title', 'Reservar Livro')

@section('body-content')

	@include('reservas.header')

	<section>
    	<div class="container">
        	<div class="row text-center pad-row">
				<div class="col-md-6">
					<h4>Procurar Dados<br>
					<small>Insira o código do cliente  e o código do livro para efetuar a reservar.</small></h4>
					{!! Form::open(['route' => 'confirmarEmprestimo', 'method' => 'post']) !!}					
						@include('reservas.form-busca')	
					{!! Form::close() !!}			
				</div>
				<div class="col-md-6">
					<h4>Localizar Reserva<br>
					<small>Insira o código do reserva para localizar as informações.</small></h4>
					{!! Form::open(['route' => 'localizarReserva', 'method' => 'post']) !!}	
						@include('reservas.localizar')	
					{!! Form::close() !!}			
				</div>
			</div>
		</div>
	</section>

@stop