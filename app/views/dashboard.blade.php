@extends('layout')

@section('content')
	
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    
    		<div class="navbar-header">
      			<a href="#"><img src="images/logo.png" style="height: 40px; margin-top: 5px;"></a>
    		</div>

      		<ul class="nav navbar-nav navbar-right">
		        <li><p> {{ Lang::get('messages.welcome') }},<b> {{ Auth::user()->name; }} </b></p></li>
		        <li class="dropdown">
	          		<a href="#" class="dropdown-toggle glyphicon glyphicon-cog" data-toggle="dropdown"><b class="caret"></b></a>
	          		<ul class="dropdown-menu">
		        		<li><a href="#"> {{ Lang::get('messages.contact') }} </a></li>
		        		<li class="divider"></li>
			            <li><a href="./logout"> {{ Lang::get('messages.logout') }} </a></li>
	          		</ul>
        		</li>
      		</ul>
  		</div>
	</nav>

	<div class="container" style="background-color: #252525;">
		<div id="nuevo">
			
		{{ Form::open(array('url' => 'dashboard/check', 'role'=>'form')) }}
	    	
	    	{{ Form::textarea('message', '', array('class'=>'form-control', 'placeholder'=>'Clippea'))}}
			
			<button type="submit" id="bottom-share" class="btn btn-default" style="float: right"><span class="glyphicon glyphicon-pencil"></span></button>

			@if(Session::has('errors'))
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<p>{{$error}}</p>
					@endforeach
				</div>
			@endif

		{{ Form::close() }}

		</div>
		<div id="contenido">

		</div>

	</div>

	<div class="navbar-fixed-bottom text-center">
		<p> {{ Lang::get('messages.footer1') }} <a href="https://www.facebook.com/alvaro.sauci">Alvaro Sauci Valdayo</a> {{ Lang::get('messages.footer2') }}</p>
	</div>

@stop