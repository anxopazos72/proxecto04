@extends('layouts.master')

@section('titulo')
    Blog parroquial - Contacto
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
        
       <div class="row justify-content-center">       
         <div class="col-sm-10">
            <div class="card">
            
                <form method="post" action="{{ route('contacto.guardar') }}" id="commentform">
                    {{ csrf_field() }}
                    
                    <p><input id="id_nombre" name="nombre" type="text" value="" size="10" placeholder="Nombre"/></p>
                    <p><input id="id_email" name="email" type="text" value="" size="10" placeholder="Correo electrónico"/></p>
					<p><textarea id="id_mensaje" name="mensaje" rows="8" placeholder="Escríbenos tu mensaje"></textarea></p>	
                    
                    <button type="submit" class="btn-sm btn-info">Enviar</button>
                </form>

             </div>
           </div>               
         </div>
            
       </div>

            <aside class="col-sm-3 ml-sm-auto blog-sidebar">
            	<div class="sidebar-module-white">
                	@include('parciales.twitter')
                </div>
                <br/>
                
            </aside>

        </div>
    </main>
    <br/>
@endsection

@section('pie')
	@include('parciales.pie')
@endsection