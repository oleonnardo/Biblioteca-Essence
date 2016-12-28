
	
		<div class="form-group">
			<div class="row">
				@if (Session::has('erroReserva'))
					<div class="alert alert-danger"> {{ session::get('erroReserva') }} </div>
				@endif
				<hr>	
				<div style="display:none">
					@if (Session::has('codCliente')) {{ $codCliente = session::get('codCliente') }} @else  {{ $codCliente = '' }} @endif
					@if (Session::has('codLivro')) {{ $codLivro = session::get('codLivro') }}  @else {{ $codLivro = '' }} @endif
				</div>

				<div class="col-md-6">
					<label for='codCliente' class='control-label'>Código do Cliente</label>
					<input type="number" name="codCliente"  id="codCliente" value="{{ $codCliente }}" class="form-control">
				</div>
				<div class="col-md-6">
					<label for='codLivro' class='control-label'>Código do Livro</label>
					<input type="number" name="codLivro"  id="codLivro" value="{{ $codLivro }}" class="form-control">
				</div>
			</div>	
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-info" type="submit"><i class="fa fa-search"></i> Buscar</button>
				</div>
			</div>
		</div>