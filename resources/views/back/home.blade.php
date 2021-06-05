@extends('layouts.master-admin')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            
            @include('parciales.izquierda')
 
            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3" style="margin-top: 60px;">
                <h1>Posts
                    <a href="{{ route('post.formulario') }}">
                        <button type="button" class="btn btn-primary btn-sm">Crear Post</button>
                    </a>
                </h1>
                @if(Session::has('success'))
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                            <div id="message" class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Creado el</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($posts)
                        @foreach($posts as $post)
                            <tr>
                                <th>{{ $post->id }}</th>
                                <td><a href="{{ route('post.detalle', ['id' => $post->id]) }}">{{ $post->titulo }}</a></td>
                                <td>{{ $post->name }}</td>
                                <td>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y')  }}</td>
                            </tr>
                        @endforeach
                    @else
                        <p class="text-center text-primary">No hay posts creados todavía</p>
                    @endif
                </table><Br>
                <nav class="pagination">
                   {{ $posts->links() }}
                </nav>
            </main>
        </div>
    </div>
@endsection

