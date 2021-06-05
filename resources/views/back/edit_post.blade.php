@extends('layouts.master-admin')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            
            @include('parciales.izquierda')

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3" style="margin-top: 60px;">
                <h1>Editar Post</h1>
                <div class="col-md-6">
                    <form method="post" action="{{ route('post.actualizar', ['id' => $post->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="id_titulo" name="titulo"
                                   aria-describedby="titulo" value="{{ $post->titulo }}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="id_descripcion" rows="5" name="descripcion">{{ $post->descripcion }}</textarea>
                        </div>
        
                        <div class="form-group">
                            <label for="seccion">Sección: <b>{{ $post->seccion }}</b></label>
                            <select class="form-control" id="id_seccion" name="seccion" aria-describedby="seccion">
                                    <option>Noticias</option>
                                    <option>Catequesis</option>
                                    <option>Liturgia</option>
                                    <option>Cáritas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualiza post</button>
                    </form>

                </div>
            </main>
        </div>
    </div>
@endsection