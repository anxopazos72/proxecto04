@extends('layouts.master')
 
@section('titulo')
    Blog parroquial
@endsection

@section('contenido')
       <main role="main" class="container"  style="margin-top: 60px;">
       
		@include('parciales.carrusel')
       
        <div class="row">

            <div class="col-sm-8 blog-main">

               @foreach($posts as $post)
                    <div class="blog-post">
                        <h2 class="blog-post-title"><a href="{{ route('post.leer', ['post_id' => $post->id]) }}">{{ $post->titulo }}</a></h2>
                        <p class="blog-post-meta"><small><i>Escrito el <span id="info-fecha">{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y')  }}</span> por <span id="info-autor">{{ $post->name }}</span> en <a href="{{ route('seccion', ['id' => $post->seccion]) }}">{{ $post->seccion }}</a> </i></small></p>

                        <div class="parrafo">{!! \Illuminate\Support\Str::words($post->descripcion, 40, '...') !!}</div>
                        <blockquote>
                            <p>
                                <a href="{{ route('post.leer', ['post_id' => $post->id]) }}" class="btn btn-info btn-sm">Leer más</a> </p>
                        </blockquote>
                        <div class="cierre-post"></div>
                    </div>
                    <br>
                @endforeach
                
                <nav class="pagination">
                   {{ $posts->links() }}
                </nav>

            </div>

            <aside class="col-sm-3 ml-sm-auto blog-sidebar">
                <div class="sidebar-module">
                    <h4>Últimos comentarios</h4>
                    @foreach($comentarios as $comentario)
                        <ol class="list-unstyled">
                        <img class="avatar" src="{{ URL::to('img/avatar.png') }}" alt="{{ $comentario->nombre }}">
                            <li class="comentario"><a href="{{ route('post.leer', ['post_id' => $comentario->post]) }}#comentarios">{!! \Illuminate\Support\Str::words($comentario->texto_comentario, 9, '...') !!}</a></li>
                        </ol>
                    @endforeach
                </div>
                <br/>
                <div class="sidebar-module">
                	<h4>Mensajes de nuestros amigos</h4>
                      @foreach ($items as $item)
                        <div>  	
                          <p class="feed"><a href="{{ $item->get_permalink() }}" target="_blank">{{ $item->get_title() }}</a><br/>
                          <small><i>Publicado el {{ $item->get_date('d-m-Y') }}</i></small>
                          </p>
                        </div>
                      @endforeach
                </div>
                <br/>
                
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