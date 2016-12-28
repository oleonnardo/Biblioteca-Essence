@extends('main')

@section ('page-title', 'Gerenciamento da Biblioteca')

@section('body-content')

	@include('livros.header')

	<section>
    	<div class="container">
        	<div class="row text-center pad-row">
	
				@if(isset($_GET['search']))
					Você pesquisou por: <b>{{ $_GET['search'] }}</b>
					<hr>
				@endif

				<div class="row">
					<div class="col-md-3">
						<h4>Listar Livros</h4>
						@include ('livros.form-busca')
					</div>
					<div class="col-md-9">
						<table class="table table-bordered table-striped" align="center">
							<thead>
								<tr>
									<th>Livro</th>
									<th>Autores</th>
									<th>Descrição</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								@if(session('resultado'))
									<div class="alert alert-danger">
										{{ session('resultado') }}
									</div>
									<hr>
								@else
									@foreach($livros as $livro)
									<tr>
										<td align="center" width="30%">
										<a href="{{ route('livros.edit', $livro->id) }}">
											<img src="/images/livros/{{ $livro->capa }}" width="90"></a>
								        		<br /><small style="color:#666; font-size:12px">Cód.: {{ $livro->codigo }}</small>
								        		<br />
								        		@if($livro->quantidade > 0) 
								        			<small style="color:green; font-size:12px">Disponível</small>
								        		@else
								        			<small style="color:red; font-size:12px">Não há livros disponíveis</small>
								        		@endif
								                <br /><a href="{{ route('livros.edit', $livro->id) }}">{{ $livro->titulo }}</a>
								        </td>
										<td>{{ $livro->autores }} </td>
										<td>{{ str_limit($livro->descricao, 400) }} </td>
										<td width="1%" nowrap>
										<!--a href="{{ route('deletaLivro', ['id' => $livro->id]) }}" class="btn btn-xs btn-danger">Excluir</a><br-->
										<a href="{{ route('reservaLivro', ['id' => $livro->id]) }}" class="btn btn-xs btn-info @if($livro->quantidade == 0) disabled  @endif">Reservar</a>
										</td>
									</tr>
									@endforeach
								@endif
							</tbody>
						</table>

						@if(!(isset($_GET['search'])))
							{{ $livros->links() }}
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
@stop
