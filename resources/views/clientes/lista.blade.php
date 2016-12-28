@extends('main')

@section ('page-title', 'Gerenciamento de Clientes')

@section('body-content')

	@include('clientes.header')

	<section>
    	<div class="container">
        	<div class="row text-center pad-row">
				<div class="col-md-8">

					@if(isset($_GET['search']))
						Você pesquisou por: <b>{{ $_GET['search'] }}</b>
						<hr>
					@endif

					@if(Session::has('delCLiente'))
						<div class="alert alert-success">
							{ Session::get('delCiente') }}
						</div>
						<hr>
					@endif

					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Código</th>
								<th>Nome</th>
								<th>Endereço</th>
								<th>Telefone/Email</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							@foreach($clientes as $cliente)
							<tr>
								<td>{{ $cliente->codigo }}</td>
								<td><a href="{{ route('clientes.edit', $cliente->id) }}">{{ $cliente->nome }}</a></td>
								<td>{{ $cliente->endereco }} </td>
								<td>{{ $cliente->telefone }} <br> {{ $cliente->email }}</td>
								<td width="1%" nowrap>
									<div style="width: 20px; height: 20px; border-radius: 50%;" class="{{$cliente->status}}"></div>
									<!--a href="{{ route('deletaCliente', ['id' => $cliente->id]) }}" class="btn btn-xs btn-danger">Excluir</a-->
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					@if(!(isset($_GET['search'])))
						{{ $clientes->links() }}
					@endif
				</div>

				<div class="col-md-4" style="border-left: 2px dashed #000 ;">
					<h4>Procurar Cliente</h4>
					@include('clientes.form-busca')
				</div>
			</div>
		</div>
	</section>
@stop
