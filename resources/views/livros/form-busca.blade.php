<div class="text-right">
	{!! Form::open(['route' => 'buscaLivro', 'method' => 'get']) !!}
		
		<div class="form-group">
			<div class="input-group">
			    <input type="text" class="form-control" name="search" id="nome" placeholder='Busca... + ENTER'>
			</div>
		</div>
		<div class="form-group">
			<select name="type" class="form-control">
				<option value='titulo'>Filtrar Busca...</option>
				<option value='codigo'>Código do Livro</option>
				<option value='titulo'>Título do Livro</option>
				<option value='autores'>Citar Autores</option>
				<option value='localizacao'>Localizar Pratileira....</option>
				<option value='descricao'>Descrição do Livro</option>
				<option value='tags'>Pelas Categoria de Filme</option>
			</select>
		</div>	
	{!! Form::close() !!}
</div>

<ul class="list-group">
  	<li class="list-group-item"><a href="{{ route ('livros.index') }}">Novo Livro</a></li>
</ul>

