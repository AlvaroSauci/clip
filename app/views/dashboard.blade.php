@extends('layout')

@section('content')
	
	<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
  		<div class="container-fluid">
  			<div class="row">
    
<<<<<<< HEAD
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
			            <li><a href="{{URL::to('logout')}}"> {{ Lang::get('messages.logout') }} </a></li>
	          		</ul>
        		</li>
      		</ul>
=======
	    		<div class="col-xs-1 navbar-header">
	      			<a href="#"><img src="images/logo.png" style="height: 40px; margin-top: 5px;"></a>
	    		</div>
				
				<div class="col-xs-offset-7 col-xs-4">
		      		<ul class="nav navbar-nav navbar-right">
		      			<li> 
		      				<!-- Button trigger modal -->
							<button class="btn btn-link btn-lg" data-toggle="modal" data-target="#myModal" >
								<span class="glyphicon glyphicon-pencil"></span>
							</button>
						</li>
				        <li><p> {{ Lang::get('messages.welcome') }},<b> {{ Auth::user()->name; }} </b></p></li>
				        <li class="dropdown">
			          		<a href="#" class="dropdown-toggle glyphicon glyphicon-cog" data-toggle="dropdown"><b class="caret"></b></a>
			          		<ul class="dropdown-menu">
				        		<li><a href="#"> {{ Lang::get('messages.contact') }} </a></li>
				        		<li class="divider"></li>
					            <li><a href="logout"> {{ Lang::get('messages.logout') }} </a></li>
			          		</ul>
		        		</li>
		      		</ul>
				</div>
	      	</div>
>>>>>>> 34f0fe88a3ac7264861c43fee066af61ef0faed8
  		</div>
	</nav>

	<div class="container">
		<div class="col-xs-offset-1 col-xs-10 col-xs-offset-1">
			<div class="row">
				@if(Session::has('errors'))
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						@foreach ($errors->all() as $error)
							<p>{{$error}}</p>
						@endforeach
					</div>
				@endif

				<div class="col-xs-4">
					
				{{ Form::open(array('url' => 'dashboard/check', 'role'=>'form')) }}
			    	
			    	{{ Form::textarea('message', '', array('class'=>'form-control', 'placeholder'=>'Clippea', 'rows'=>'5'))}}
					
					<div id="botones">
						<button type="submit" class="btn btn-success btn-lg" style="float: right"><span class="glyphicon glyphicon-pencil"></span></button>
					</div>

				{{ Form::close() }}

				</div>
				<div class="col-xs-8">

				@foreach ($comments as $comment)

					<div class="panel panel-default">
						<div class="panel-body"> <p> {{ $comment->message }} </p> <p><span>{{ $comment->name.' - '.$comment->created_at }}</span></p> </div>
					</div>
					
				@endforeach

				{{ $comments->links() }}

				</div>		
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				{{ Form::open(array('url' => 'dashboard/check', 'role'=>'form')) }}
					<div class="modal-content">
						<div class="modal-body">

					    	{{ Form::textarea('message', '', array('class'=>'form-control', 'placeholder'=>'Clippea', 'rows'=>'5'))}}

						</div>
						<div id="botones">
							<button type="submit" id="bottom-share" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-pencil"></span></button>
							<button type="buttom" class="btn btn-danger btn-lg" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>

	</div>

	<div class="navbar text-center">
		<p> {{ Lang::get('messages.footer1') }} <a href="https://www.facebook.com/alvaro.sauci">Alvaro Sauci Valdayo</a> {{ Lang::get('messages.footer2') }}</p>
	</div>

@stop