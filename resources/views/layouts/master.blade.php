<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <link rel="shortcut icon" type="image/png" href="{{ URL::to('img/icono.png') }}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/back.css') }}">    
    <link rel="stylesheet" href="{{ URL::to('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/front.css') }}">
    
    <script type="text/javascript" src="{{ URL::to('js/ajax.js') }}"></script> 
    @yield('estilos')
</head>
<body>
	@include('parciales.cabecera')
        
    @yield('contenido')

	@yield('pie')    
    <script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/carrusel.owl.js') }}"></script>
    @yield('scripts')

</body>
</html>