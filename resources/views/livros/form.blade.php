		<div class="row">
		<div class="col-md-4">
			<div class="form-group">

				{!! Form::label('codigo', 'Código do Livro: ', array('class' => 'control-label')) !!}
				<input type="text" id="codigo" value="@if(isset($livros->codigo)){{$livros->codigo}}@else{{mt_rand()}}@endif" class='form-control' readonly name="codigo" size="15">
			</div>
		</div>
	</div>	

	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				{!! Form::label('titulo', 'Título : ', array('class' => 'control-label')) !!}
				{!! Form::text('titulo', null, ['class' => 'form-control']) !!}
			</div>
		
			<div class="form-group">
				{!! Form::label('autores', 'Autor(es) : ', array('class' => 'control-label')) !!}
				{!! Form::textarea('autores', null, ['class' => 'form-control', 'rows' => '3']) !!}
			</div>
		
			<div class="form-group">
				{!! Form::label('tags', 'Tags : ', array('class' => 'control-label')) !!}
				{!! Form::textarea('tags', null, ['class' => 'form-control', 'rows' => '3']) !!}
			</div>
							
			<div class="form-group">
				{!! Form::label('quantidade', 'Quantidade : ', array('class' => 'control-label')) !!}
				{!! Form::text('quantidade', null, ['class' => 'form-control']) !!}
			</div>
							
			<div class="form-group">
				{!! Form::label('localizacao', 'Localização do livro : ', array('class' => 'control-label')) !!}
				{!! Form::text('localizacao', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('descricao', 'Descrição : ', array('class' => 'control-label')) !!}
				{!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => '20']) !!}
			</div>
			<div class="form-group">
				<button class="btn btn-info" type="submit">Salvar</button>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group" align="center">
				@if(isset($livros->capa))
					<img src="/images/livros/{{$livros->capa}}" width="300"> 
				@else
					<img src="{{ asset('images/livros/padrao.jpg') }}" width="300"> 
				@endif
			</div>
			<div class="form-group">
				{!! Form::label('capaLivro', 'Carregar Capa do Livro: ', array('class' => 'control-label')) !!}
				{!! Form::file('capaLivro') !!}
				@if( Session::has('erroImg')) <div class="text-danger">{{ Session::get('erroImg') }}</div> @endif
				
			</div>
		</div>
	</div>
