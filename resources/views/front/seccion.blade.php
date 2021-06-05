@extends('layouts.master')

@section('titulo')
    Blog parroquial
@endsection

@section('contenido')
    <main role="main" class="container"  style="margin-top: 60px;">

        <div class="row">

            <div class="col-sm-8 blog-main">

               @foreach($seccion as $item)
                    <div class="blog-post">
                        <h2 class="blog-post-title"><a href="{{ route('post.leer', ['post_id' => $item->id]) }}">{{ $item->titulo }}</a></h2>
                        <p class="blog-post-meta"><small><i>Escrito el <span id="info-fecha">{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y')  }}</span> por <span id="info-autor">{{ $item->name }}</span></i></small></p>

                        <p>{!! \Illuminate\Support\Str::words($item->descripcion, 30, '...') !!}</p>
                        <blockquote>
                            <p>
                                <a href="{{ route('post.leer', ['post_id' => $item->id]) }}" class="btn btn-info btn-sm">Leer más</a> </p>
                        </blockquote>
                        <div class="cierre-post"></div>
                    </div>
                    <br>
                @endforeach
                
                <nav class="pagination">
                   {{ $seccion->links() }}
                </nav>

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