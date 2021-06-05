@extends('layouts.master')

@section('titulo')
    Blog parroquial
@endsection

@section('contenido')
    <main role="main" class="container"  style="margin-top: 60px;">

        <div class="row">

            <div class="col-sm-8 blog-main">            
            
               @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if(Session::has('success'))
                            <div id="message" class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                @endif
        
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{ $post->titulo }}</h2>
                        <p class="blog-post-meta"><small><i>Escrito el <span id="info-fecha">{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y')  }}</span> por <span id="info-autor">{{ $post->name }}</span> en <a href="{{ route('seccion', ['id' => $post->seccion]) }}">{{ $post->seccion }}</a> </i></small></p>

                        <div class="parrafo">{!! \Illuminate\Support\Str::ucfirst($post->descripcion) !!}</div>
                    </div>
                    <br/>
                    
                    <div class="col-sm-8">
                     <a name="comentarios"></a>
                    	@foreach($comentarios as $comentario)
                        	<div class="comentario_autor col-sm-4">{{ $comentario->nombre }}:</div>
                            <div class="comentario_texto">{{ $comentario->texto_comentario }}</div>
                        @endforeach
                    </div>
            
        @if(Session::has('success'))
            <div class="row">
                <div class="col-sm-8 col-md-4 col-md-offset-4 col-sm-offset-3">
                    <div id="message" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
        @endif    
        
       <div class="row justify-content-center">
         <div class="col-sm-10">
            <div class="card">
             	<div class="card-header bg-info text-white">{{ __('Comentario') }}</div>
              	  <div class="card-body">
                    <form method="post" action="{{ route('post.comentario') }}" id="commentform">
                        {{ csrf_field() }}
                        <input name="post_id" type="hidden" value="{{ $post->id }}">
                        
                        <p><input id="id_nombre" name="nombre" type="text" value="" size="10" placeholder="Nombre"/></p>
                        <p><input id="id_email" name="email" type="text" value="" size="10" placeholder="Correo electrónico"/></p>
                        <p><textarea id="id_comentario" name="comentario" rows="4" placeholder="Escríbenos tu comentario"></textarea></p>
                        
                        <button type="submit" class="btn-sm btn-info">Enviar</button>
                    </form>
                  </div>
             </div>
          </div>
       </div>
       <br/>
        
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
            <br/>

        </div>

    </main>
@endsection

@section('pie')
	@include('parciales.pie')
@endsection