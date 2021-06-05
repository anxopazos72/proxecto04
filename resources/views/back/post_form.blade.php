@extends('layouts.master-admin')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            
            @include('parciales.izquierda')

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3" style="margin-top: 60px;">
                <h1>Crea un post</h1>
                <div class="col-md-6">
                    <form method="post" action="{{ route('post.formulario') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="id_titulo" name="titulo"
                                   aria-describedby="titulo" placeholder="Ponle un título">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="id_descripcion" rows="5" name="descripcion" placeholder="Escribe lo que quieras"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="seccion">Sección</label>
                            <select class="form-control" id="id_seccion" name="seccion" aria-describedby="seccion">
                                    <option>Noticias</option>
                                    <option>Catequesis</option>
                                    <option>Liturgia</option>
                                    <option>Cáritas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear post</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection