@extends('layout')

{{ HTML::style('css/signin.css') }}

@section('content')

	<div class="text-right">
		<span><a href="{{ URL::route('login') }}" class="btn btn-primary"> {{Lang::get('messages.submit')}} </a></span>
		<a href="lang/es" ><img src = "./images/españa_icono.png" /></a>
		<a href="lang/en" ><img src = "./images/ingles_icono.png" /></a>
	</div>

	<div class="row">
		<div class="col-xs-4 col-xs-offset-3" >	
		    
		    <div class="text-center">
				<img src="./images/logo.png" class="img">
			</div>

		    {{ Form::open(array('url' => 'register/check', 'class'=>'form-signin', 'role'=>'form')) }}
		    	
				{{ Form::email('email', '', array('class'=>'form-control', 'placeholder'=>Lang::get('messages.email')))}}
				
		    	{{ Form::text('name', '', array('class'=>'form-control', 'placeholder'=>Lang::get('messages.name')))}}

				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>Lang::get('messages.password'))) }}

				{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>Lang::get('messages.password_confirmation'))) }}

				@if(Session::has('errors'))
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						@foreach ($errors->all() as $error)
							<p>{{$error}}</p>
						@endforeach
					</div>
				@endif
				
				{{ Form::submit(Lang::get('messages.register'), array('class'=>'btn btn-lg btn-primary btn-block')) }}

			{{ Form::close() }}

		</div>
	</div>

@stop

