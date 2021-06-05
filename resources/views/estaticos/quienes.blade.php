@extends('layouts.master')
 
@section('titulo')
    Blog parroquial - Quiénes somos
@endsection

@section('contenido')

       <main role="main" class="container"  style="margin-top: 60px; margin-bottom:60px">
       
        <div class="row">

            <div class="col-sm-8 blog-main">
            	<h2>Presentación</h2>
				<p class="presentacion">Bienvenido/a y gracias por visitarnos. Te presentamos la parroquia de Barciela (Sigüeiro), cuyo patrono es san Andrés, situada a 12 km al norte de la ciudad de Santiago de Compostela, en la ruta inglesa del Camino de Santiago, atravesada por el río Tambre.</p>
                <figure><img class="fotosparroquia" src="{{ URL::to('img/parroquia01.jpg') }}"><figcaption>Fotografía © Muriel Bergasa</figcaption></figure>

				<p class="presentacion">Tradicionalmente constaba de los lugares siguientes: Vintecatro, Caluba, Fonte do Torno, O Balado, Polveira, Sigüeiro, Benavente, Barciela, A Foca, O Portiño, Monte. Recientemente está experimentando un gran crecimiento demográfico, por lo que los lugares al norte del río forman el pueblo de Sigüeiro propiamente dicho y no se distinguen como antaño. Su iglesia fue construida en el año 1917, como se puede ver en su fachada. También de ese año es la casa rectoral adyacente, en la que pronto comenzarán las obras de rehabilitación del inmueble para uso parroquial (locales, despacho, etc.).</p>
				<figure><img class="fotosparroquia" src="{{ URL::to('img/parroquia02.jpg') }}"><figcaption>Fotografía © Muriel Bergasa</figcaption></figure>
                
                <p class="presentacion">Esta web tiene como objetivo la evangelización en general y la difusión de noticias eclesiales de esta parroquia en particular, aunque carece de carácter oficial, tiene la completa aprobación y colaboración de su actual Administrador Parroquial, d. Oscar Valado.</p>
                <figure><img class="fotosparroquia" src="{{ URL::to('img/parroquia03.jpg') }}"><figcaption>Fotografía © Muriel Bergasa</figcaption></figure>

				<p class="presentacion">La responsabilidad de los artículos o vídeos aquí publicados pertenece a cada autor.</p>
               
			</div>
            <aside class="col-sm-3 ml-sm-auto blog-sidebar">
                <div class="sidebar-module">
                <h4>Horarios de celebraciones</h4>
                    <p class="horarios">Celebración diaria de la <mark>Santa Misa</mark> a las 18:00h. (19:00 en Primavera y verano)</p>
                    <p class="horarios">Celebración Dominical de la <mark>Santa Misa</mark> a las 12:30h.</p>
                    <p class="horarios"><mark>Confesiones</mark>: media hora antes de cada celebración.</p>
                    <p class="horarios">Sacramento del <mark>Bautismo</mark>: primeros y terceros domingos de mes.</p>
                    <p class="horarios"><mark>Via Crucis</mark>. Todos los viernes de Cuaresma a las 17:30.</p>
                </div>
                <br/>
                
                <div class="sidebar-module-white">
                <h4>Dónde estamos</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2919.6713384082345!2d-8.447748685001457!3d42.964129979150904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2e565ea8c6a76d%3A0xd198018e2163f553!2sIglesia+de+San+Andr%C3%A9s+de+Barciela!5e0!3m2!1sgl!2shu!4v1534753172021" width="220" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <br/>
                
                <div class="sidebar-module">
                <h4>Lecturas de la misa</h4>
                
                    @include('parciales.lecturas')

                </div>
                
            </aside>

        </div>

    </main>
@endsection

@section('pie')
	@include('parciales.pie')
@endsection