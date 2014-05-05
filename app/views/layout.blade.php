<html>

	{{ HTML::style('css/bootstrap.css') }}

    <body>

    	@yield('content') <!--Aqui es donde se insertará todo nuestro contenido--> 

    	{{ HTML::script('js/bootstrap.js') }}
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/bootstrap.js"></script>
		
    </body>
</html>