@extends ('main')

@section ('page-title', 'Home')

@section('body-content')
	
	@include('includes.slide')
	@include('includes.intro')

	<section  class="note-sec" style="background-image: url({{ asset('images/slide/back-index.png') }})">
    	<div class="container">
         	<div class="row text-center pad-row" >
            	<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 ">
                	<i class="fa fa-quote-left fa-3x"></i>
               		<p>	Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                     	Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                    </p>
                </div>
			</div>
        </div>   
    </section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
		    		<div class="well">
		            	<form action="#">
		              		<div class="input-group">
		                		<input class="btn btn-lg" name="email" id="email" type="email" placeholder="Seu email" required>
		                 		<button class="btn btn-info btn-lg" type="submit">Inscreva-se</button>
		              		</div>
		             	</form>
		    	 	</div>
		        </div>
			</div>
		</div>
	</section>

@stop
