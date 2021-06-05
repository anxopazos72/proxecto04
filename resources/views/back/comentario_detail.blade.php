@extends('layouts.master-admin')
 
@section('contenido')
    <div class="container-fluid">
        
        @include('parciales.izquierda')
 
            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3" style="margin-top: 60px;">
                <div class="col-sm-8 blog-main">
                    <p>{{ $comentario->texto_comentario }}</p>
                    @if($comentario->aprobado == 'No')
                        <a href="{{ route('comentario.aprobar', ['id' => $comentario->id]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Aprobar</button>
                        </a>
                    @endif
                    
                    <a href="{{ route('comentario.borrar', ['id' => $comentario->id]) }}">
                        <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                    </a>
                </div>
            </main>
        </div>
    </div>
@endsection