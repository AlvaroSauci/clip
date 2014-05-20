@extends('layout')

@section('content')

	<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
  		<div class="container-fluid">
  			<div class="row">

	    		<div class="col-xs-1 navbar-header">
	      			<a href="{{ URL::route('dashboard') }}"><img src="images/logo.png" style="height: 40px; margin-top: 5px;"></a>
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
				        		<li><a href="{{ URL::route('contact') }}"> {{ Lang::get('messages.contact') }} </a></li>
				        		<li class="divider"></li>
					            <li><a href="logout"> {{ Lang::get('messages.logout') }} </a></li>
			          		</ul>
		        		</li>
		      		</ul>
				</div>
	      	</div>
  		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 col-xs-offset-1">
				@if(Session::has('errors'))
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						@foreach ($errors->all() as $error)
							<p>{{$error}}</p>
						@endforeach
					</div>
				@endif

				@if(Session::has('msg'))
					<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('msg') }}
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
							<div class="panel-body"> 

								<p> {{ $comment->message }} </p>
								<p><span>{{ $comment->name.' - '.$comment->created_at }}</span></p>
								<a class="btn-link glyphicon glyphicon-share-alt"></a>
								<a class="btn-link glyphicon glyphicon-retweet" href="dashboard/reclippeaComment/{{$comment->id}}"></a>

							</div>
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

	<div class="navbar">
		<p> {{ Lang::get('messages.footer1') }} <a href="https://www.facebook.com/alvaro.sauci">Alvaro Sauci Valdayo</a> {{ Lang::get('messages.footer2') }}</p>
	</div>

@stop