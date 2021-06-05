<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">    
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog parroquial - Galería de imágenes</title>

    <link rel="stylesheet" href="{{ URL::to('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/back.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/front.css') }}">
    
    <script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/jquery.magnific-popup.js') }}"></script> 

</head>

<body>
@include('parciales.cabecera')

<main role="main" class="container"  style="margin-top: 60px;">
	   
    <h2>{{$titulo}}</h2>
    <div class="row">
        
        @for ($numero = 1; $numero <= 10; $numero++)	      
           <div class="col-md-3">
            <div class="thumbnail">   
                   
                <a href="../img/galeria/{{$id}}-{{$numero}}.jpg" data-group="{{$id}}" class="galleryItem">
                <img src="../img/galeria/{{$id}}-{{$numero}}.jpg" style="width:100%;">
                    <div class="caption">
                      <p>{{$titulo}} {{$numero}}</p>
                    </div>
                </a>           
                
             </div>
           </div>
        @endfor                              

    </div>
</main>

@include('parciales.pie')

<script type="text/javascript" src="{{ URL::to('js/galeria.js') }}"></script>

</body>
</html>
