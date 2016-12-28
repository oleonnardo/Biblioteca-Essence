@extends('main')

@section ('page-title', 'Detalhar Empréstimo')

@section('body-content')

	@include('emprestimos.header')

	<section>
    	<div class="container">
        	<div class="row text-center pad-row">
				<div class="col-md-3">
					@if(isset($msg))
						@if($msg[1] == '1')
							<div class="alert alert-success">Empréstimo Finalizado</div>
						@elseif($msg[1] == '2')
							<div class="alert alert-success">Empréstimo Renovado</div>
						@endif
					@endif
					<p>
						<b>Nome : </b><a href="{{ route('clientes.edit', $dadosClientes->id) }}" target="_blank">{{ $dadosClientes->nome }}</a><br> 
						<b>Endereco : </b> {{ $dadosClientes->endereco }}<br> 
						<b>Telefone : </b> {{ $dadosClientes->telefone }}<br> 
						<b>Email : </b> {{ $dadosClientes->email }}<br> 
						<b>Status : </b> <span style="color: #fff; text-align: center; padding: 10px; font-weight: bold;" class="{{ $dadosClientes->status }}">{{ $dadosClientes->status }}</span>
						<br>
					</p>
 					<hr>
 					@if(isset($multa[25]))
	                    @if($multa[25] > 0)
			           		<div class="col-md-12">
			                   	<div class="alert alert-danger">
			                   		Total de dias em atraso : {{ $multa[25] }}<br>
			                   		Total do valor a ser pago :  {{ $multa[25]*0.50}}
			                   	</div>
			                   	<a href="#geraboleto" target="_blank" class="btn btn-danger">Gerar Boleto</a>
			                </div>
	                    @endif
	                @endif
				</div>

				<div class="col-md-9">
					<div class="row tabs">
                        <div class="col-sm-3">
                     		<ul class="nav nav-pills nav-stacked">
                     		@php $c = 0 @endphp  
                     		@foreach($dadosLivros as $dadolivro)
								<li @if($c == 0) class="active" @endif>
                            		<a href="#{{ $c }}" data-toggle="tab">{{$dadolivro->titulo}}<br>
                            		@if($multa[$c] != "")
                            			<small style="font-size: 12px; color: red; font-style: italic;"> Livro em atraso!</small>
                            		@endif
                            		</a>
                                </li>
                                @php $c++ @endphp
                            @endforeach
                            </ul>
                        </div>
                        
						<div class="col-sm-9">
                        	<div class="tab-content">
                        		@php $c = 0 @endphp  
                     			@foreach($dadosLivros as $dadolivro)
	                            	<div class="tab-pane fade @if($c == 0) active in @endif" id="{{$c}}">
	                                	<div class="row">
	                                        <div class="col-md-5">
	                                        	<img src="/images/livros/{{ $dadolivro->capa }}" width="250" alt="{{$dadolivro->titulo}}">
	                                        </div>
	                                        <div class="col-md-7">
	                                        	<h3 class="no-margin no-padding"><a href="{{ route('livros.edit', $dadolivro->id) }}" target="_blank">{{$dadolivro->titulo}}</a><br>
	                                        	<small>{{$dadolivro->autores}}</small></h3>
	                                        	<p>	<b>Data do Empréstimo : </b> {{ $dadosEmprestimo[$c]->dt_emprestimo }}<br>
	                                        		<b>Data da Devolução : </b> {{ $dadosEmprestimo[$c]->dt_entrega }}<br><hr>
	                                        		<b>Descricao : </b> {{ str_limit($dadolivro->descricao, 200) }}<br>
	                                        		<b>Categorias : </b> <span class="italico">{{ $dadolivro->tags }}</span><br>
	                                        	</p>

	                                        	@if($multa[$c] == "" || $multa[$c] == null)
		                                        	<div class="col-md-6">
		                                        		<div align="center">
		                                        			<a href="{{ route('renovarEmprestimo', [$dadosClientes->codigo, $dadolivro->id]) }}" class="btn btn-default">Renovar Empréstimo</a>
		                                        		</div>
		                                        	</div>
		                                        	<div class="col-md-6">
		                                        		<div align="center">
		                                        			<form method="post" action="">
		                                        				<a href="{{ route('finalizarEmprestimo', [$dadosClientes->codigo, $dadolivro->id]) }}" class="btn btn-info">Finalizar Empréstimo</a>
		                                        			</form>
		                                        		</div>
		                                        	</div>
	                                        	@endif
	                                        	@if($multa[$c] != "" || $multa[$c] != null)
	                                        	<div class="col-md-12">
	                                        		<div class="alert alert-danger">{{ $multa[$c] }}
	                                        		<br>@if(isset($multa[$c+3])) {{ $multa[$c+3] }}  @endif</div>
	                                        	</div>
	                                        	@endif
	                                        </div>
	                                    </div>
	                                </div>
                                	@php $c++ @endphp
                            	@endforeach 
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</section>

@stop