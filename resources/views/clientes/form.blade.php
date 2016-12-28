	

	<div class="form-group">
		<div class="row">
			<div class="col-md-4">
				{!! Form::label('codigo', 'Código do Cliente: ', array('class' => 'control-label')) !!}
				<input type="text" id="codigo" value="@if(isset($clientes->codigo)) {{$clientes->codigo}} @else {{ mt_rand() }} @endif" class='form-control' readonly name="codigo" size="15">
			</div>

			<div class="col-md-6">
				{!! Form::label('status', 'Status: ', array('class' => 'control-label')) !!}
				<input type="text" value="@if(isset($clientes->status)){{$clientes->status}}@else ativo @endif" class='form-control status' readonly name="status" @if(isset($clientes->status)) id="{{$clientes->status}}" @else id="ativo" @endif>
				@if(isset($clientes->codigo)) 
					@if($clientes->codigo > 0)
						<a href="{{ route('trocaStatus', $clientes->id) }}" class="text-right"> Trocar Status</a>
					@endif
				@endif
			</div>
		</div>
	</div>	

	<div class="form-group">
		<div class="row">
			<div class="col-md-6">
				{!! Form::label('nome', 'Nome: ', array('class' => 'control-label')) !!}
				{!! Form::text('nome', null, ['class' => 'form-control']) !!}
				<span style="color:red; font-weight: bold">{{ ($errors->has('nome')) ? $errors->first('nome') : '' }}</span>
			</div>
				
			<div class="col-md-3">
				{!! Form::label('telefone', 'Telefone: ', array('class' => 'control-label')) !!}
				{!! Form::text('telefone', null, ['class' => 'form-control']) !!}
				<span style="color:red; font-weight: bold">{{ ($errors->has('telefone')) ? $errors->first('telefone') : '' }}</span>
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<div class="row">
			<div class="col-md-6">
				{!! Form::label('endereco', 'Endereço: ', array('class' => 'control-label')) !!}
				{!! Form::textarea('endereco', null, ['class' => 'form-control', 'rows' => '3']) !!}
				<span style="color:red; font-weight: bold">{{ ($errors->has('endereco')) ? $errors->first('endereco') : '' }}</span>
			</div>
						
			<div class="col-md-6">
				{!! Form::label('email', 'Email: ', array('class' => 'control-label')) !!}
				{!! Form::text('email', null, ['class' => 'form-control']) !!}
				<span style="color:red; font-weight: bold">{{ ($errors->has('email')) ? $errors->first('email') : '' }} </span>
			</div>
		</div>
	</div>

	<button class="btn btn-primary" type="submit">Salvar</button>
