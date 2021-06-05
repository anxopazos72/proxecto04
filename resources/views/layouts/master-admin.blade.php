<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">    
    <link rel="shortcut icon" type="image/png" href="{{ URL::to('img/icono.png') }}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración del blog parroquial</title>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/back.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/front.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/carrusel.css') }}">
    
    <script type="text/javascript" src="{{ URL::to('js/ajax.js') }}"></script> 
    <script type="text/javascript" src="{{ URL::to('js/ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    @yield('estilos')
</head>
<body>
	@include('parciales.cabecera-admin')
        
    @yield('contenido')

	@yield('pie')    
    <script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/ckeditor.custom.js') }}"></script> 
    <script type="text/javascript" src="{{ URL::to('js/carrusel.js') }}"></script> 
    @yield('scripts')

</body>
</html>