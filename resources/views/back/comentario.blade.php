@extends('layouts.master-admin')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            
            @include('parciales.izquierda')
 
            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3" style="margin-top: 60px;">
                <h1>Comentarios</h1>

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Autor</th>
                        <th>Email</th>
                        <th>Texto del comentario</th>
                        <th>Creado el</th>
                        <th>Aprobado</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @if($comentarios)
                        @foreach($comentarios as $comentario)
                            <tr>
                                <td>{{ $comentario->nombre }}</td>
                                <td>{{ $comentario->email }}</td>
                                <td><a href="{{ route('comentario.detalle', ['id' => $comentario->id]) }}">{!! \Illuminate\Support\Str::words($comentario->texto_comentario, 20, '...') !!}</a></td>
                                <td>{{ Carbon\Carbon::parse($comentario->created_at)->format('d-m-Y')  }}</td>                     			<td>{{ $comentario->aprobado }}</td>
                                
                            </tr>
                        @endforeach
                    @else
                        <p class="text-center text-primary">No hay comentarios creados todavía</p>
                    @endif
                </table><Br>
                <nav class="pagination">
                   {{ $comentarios->links() }}
                </nav>
            </main>
        </div>
    </div>
@endsection

