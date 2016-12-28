
<div class="form-group">
	<div class="row text-center">
		<div class="col-md-12">
			@if (Session::has('reservaNaoEncontrada'))
				<div class="alert alert-danger"> {{ session::get('reservaNaoEncontrada') }} </div>
			@endif
			<hr>	
			<div style="display:none">
				@if (Session::has('idBusca')) {{ $idBusca = session::get('idBusca') }} @else {{ $idBusca = '' }} @endif
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-12">
				<label for='idBusca' class='control-label'>Código</label>
				<input type="number" name="idBusca"  id="idBusca" value="{{ $idBusca }}" class="form-control">
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>	
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Localizar</button>
		</div>
	</div>
</div>

