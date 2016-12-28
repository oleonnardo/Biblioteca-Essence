@extends('main')

@section ('page-title', 'Cadastrar Livro')

@section('body-content')

	@include('livros.header')

	<section>
    	<div class="container">
        	<div class="row text-center pad-row">
        		<div class="col-md-3">
					<h4>Listar Livros</h4>
					@include ('livros.form-busca')
				</div>

				<div class="col-md-9">
					@if( Session::has('success'))
						<div class="alert alert-success">
							{{ Session::get('success') }}
						</div>
						<hr>
					@endif
					@if( Session::has('livroDelete'))
						<div class="alert alert-success">
							{{ Session::get('livroDelete') }}
						</div>
						<hr>
					@endif

					{!! Form::open(['route' => 'livros.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
						@include('livros.form')
					{!! Form::close() !!}			
				</div>
			</div>
		</div>
	</section>
@stop
