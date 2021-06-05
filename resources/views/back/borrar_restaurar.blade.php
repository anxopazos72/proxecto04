@extends('layouts.master-admin')
 
@section('contenido')
    <div class="container-fluid">
        
        @include('parciales.izquierda')
 
            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3" style="margin-top: 60px;">
                <h1>{{ $post->titulo }}</h1>
                <div class="col-sm-8 blog-main">
                    <div class="parrafo">{!! \Illuminate\Support\Str::ucfirst($post->descripcion) !!}</div>
                    <a href="{{ route('post.restaurar', ['id' => $post->id]) }}">
                        <button type="button" class="btn btn-primary btn-sm">Restaurar post</button>
                    </a>
                    <a href="{{ route('post.borrarhard', ['id' => $post->id]) }}">
                        <button type="button" class="btn btn-danger btn-sm">Borrar permanentemente</button>
                    </a>
                </div>
            </main>
        </div>
    </div>
@endsection