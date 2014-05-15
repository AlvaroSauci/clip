@extends('layout')

{{ HTML::style('css/signin.css') }}

@section('content')

	<div class="text-right">
		<span><a href="{{ URL::route('register') }}" class="btn btn-primary" > {{Lang::get('messages.register')}} </a></span>
		<a href="lang/es" ><img src = "./images/españa_icono.png" /></a>
		<a href="lang/en" ><img src = "./images/ingles_icono.png" /></a>
	</div>

	<div class="row">
		<div class="col-xs-offset-3 col-xs-4" >	

			<div id="info">
				@if(Session::has('msg'))
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('msg') }}
					</div>
				@endif
			</div>

			<div class="text-center">
				<img src="./images/logo.png" class="img">
			</div>
	
		    {{ Form::open(array('url' => 'login/check', 'class'=>'form-signin', 'role'=>'form')) }}
		    	
				{{ Form::email('email', '', array('class'=>'form-control', 'placeholder'=>Lang::get('messages.email')))}}
				
				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>Lang::get('messages.password'))) }}
				
				@if(Session::has('error_message'))
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('error_message') }}
					</div>
				@endif
				
				{{ Form::submit(Lang::get('messages.submit'), array('class'=>'btn btn-lg btn-primary btn-block')) }}

			{{ Form::close() }}

		</div>
	</div>

@stop

