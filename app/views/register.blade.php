@extends('layout')

{{ HTML::style('css/signin.css') }}

@section('content')

	<div class="text-right" style="margin: 10px; margin-top: 0px; float: rigth;">
		<a href="lang/es" > <img src = "./images/españa_icono.png" /> </a>
		<a href="lang/en" > <img src = "./images/ingles_icono.png" /> </a>
	</div>

	<div class="col-md-4 col-md-offset-4 offset4 span4" >	
		<div class="row">
		    
		    <div class="text-center">
				<img src="./images/logo.png" class="img">
			</div>

		    {{ Form::open(array('url' => 'register/check', 'class'=>'form-signin', 'role'=>'form')) }}
		    	
				{{ Form::email('email', '', array('class'=>'form-control', 'placeholder'=>Lang::get('messages.email')))}}
				
		    	{{ Form::text('name', '', array('class'=>'form-control', 'placeholder'=>Lang::get('messages.name')))}}

				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>Lang::get('messages.password'))) }}

				{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>Lang::get('messages.password_confirmation'))) }}

				@if(Session::has('errors'))
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<p>{{$error}}</p>
						@endforeach
					</div>
				@endif
				
				{{ Form::submit(Lang::get('messages.register'), array('class'=>'btn btn-lg btn-primary btn-block')) }}

			{{ Form::close() }}

		</div>
	</div>

	<footer class="navbar-fixed-bottom">
		<a href="{{ URL::route('login') }}" class="btn btn-primary" style="float:left; margin-bottom: 10px; margin-left: 10px"> {{Lang::get('messages.submit')}} </a>		
		<p style="text-align: center;"> {{ Lang::get('messages.footer1') }} <a href="https://www.facebook.com/alvaro.sauci">Alvaro Sauci Valdayo</a> {{ Lang::get('messages.footer2') }}</p>
	</footer>

@stop

