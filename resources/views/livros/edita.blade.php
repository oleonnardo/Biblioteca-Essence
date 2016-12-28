@extends('main')

@section ('page-title', 'Editar Livro')

@section('body-content')

	@include('livros.header')

	<section>
    	<div class="container">
        	<div class="row text-center pad-row">
        		<div class="col-md-3">
					<h4>Procurar Livro</h4>
					@include ('livros.form-busca')
				</div>

				<div class="col-md-9">
					@if( Session::has('success'))
						<div class="alert alert-success">
							{{ Session::get('success') }}
						</div>
						<hr>
					@endif
			
					{!! Form::model($livros, ['route' => ['livros.update', $livros->id, ], 'enctype' => 'multipart/form-data']) !!}
						<input type="hidden" name="_method" value="PUT">
						@include('livros.form')
					
					{!! Form::close() !!}			
				</div>
			</div>
		</div>
	</section>
@stop