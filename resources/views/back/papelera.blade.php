@extends('layouts.master-admin')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            
            @include('parciales.izquierda')
 
            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3" style="margin-top: 60px;">
                <h1>Papelera de posts</h1>

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Título</th>
                        <th>Borrado el</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($papelera)
                        @foreach($papelera as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <td><a href="{{ route('accion.papelera', ['id' => $item->id]) }}">{{ $item->titulo }}</a></td>
                                <td>{{ Carbon\Carbon::parse($item->deleted_at)->format('d-m-Y')  }}</td>
                            </tr>
                        @endforeach
                    @else
                        <p class="text-center text-primary">No hay posts borrados</p>
                    @endif
                </table><Br>
                <nav class="pagination">
                   {{ $papelera->links() }}
                </nav>
            </main>
        </div>
    </div>
@endsection

