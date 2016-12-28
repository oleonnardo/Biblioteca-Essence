
<div class="text-right">
	{!! Form::open(['route' => 'buscarCliente', 'method' => 'get']) !!}
		<div class="form-group">
			<input type="hidden" value="nome" name="type">
			<input type="text" class="form-control" name="search" id="nome" placeholder='Nome do cliente... + ENTER'>
		</div>
	{!! Form::close() !!}
</div>

<div class="text-right">
	{!! Form::open(['route' => 'buscarCliente', 'method' => 'get']) !!}
		<div class="form-group">
			<input type="hidden" value="codigo" name="type">	
			<input type="text" class="form-control" name="search" id="codigo" placeholder='Código do cliente... + ENTER'>
		</div>
	{!! Form::close() !!}
</div>

<ul class="list-group">
  	<li class="list-group-item"><a href="{{ route ('clientes.index') }}">Novo Cliente</a></li>
  	<li class="list-group-item"><a href="{{ route ('listarCliente') }}">Listar Clientes</a></li>
</ul>

