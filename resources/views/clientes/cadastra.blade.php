@extends('main')

@section ('page-title', 'Cadastrar de Cliente')

@section('body-content')

	@include('clientes.header')

	<section>
    	<div class="container">
        	<div class="row text-center pad-row">
	            <div class="col-md-8">
					@if( Session::has('success'))
						<div class="alert alert-success">
							{{ Session::get('success') }}
						</div>
						<hr>
					@endif

					{!! Form::open(['route' => 'clientes.store', 'method' => 'post']) !!}
						@include('clientes.form')
					{!! Form::close() !!}			
				</div>

				<div class="col-md-4" style="border-left: 2px dashed #000;">
					<h4>Procurar Cliente</h4>
					@include ('clientes.form-busca')
				</div>
	                    
            </div>
        </div>
    </section>
@stop

