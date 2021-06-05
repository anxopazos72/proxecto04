@extends('layouts.master')
 
@section('titulo')
    Blog parroquial
@endsection

@section('contenido')
<main role="main" class="container"  style="margin-top: 60px;">
	<div class="row">
		<div class="col-sm-8 blog-main">
        @if(isset($resultado))
        
            <h2><i>Resultados de la búsqueda:</i><span style="background-color:#FF0">{{$busca}}</span></h2>
               @foreach($resultado as $post)
                    <div class="blog-post">
                        <h3 class="blog-post-title"><a href="{{ route('post.leer', ['post_id' => $post->id]) }}">{{ $post->titulo }}</a></h3>
                        <div class="parrafo_busca">{!! \Illuminate\Support\Str::words($post->descripcion, 40, '...') !!}</div>                        
                    </div>
                    <br>
                @endforeach    

    
        @endif
        
        @if(!isset($resultado))

                <h2><i>No hemos encontrado <span style="background-color:#FF0">{{$busca}}</span></i></h3>    
                                  
        @endif

    	</div>
        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module-white">
                @include('parciales.twitter')
            </div>
            <br/>
            
            <div class="sidebar-module">
                 <h4>Lecturas de la misa</h4>
            
                @include('parciales.lecturas')
            </div>
            <br/>
       </aside>   
   </div>
</main>
   
@endsection

@section('pie')
	@include('parciales.pie')
@endsection