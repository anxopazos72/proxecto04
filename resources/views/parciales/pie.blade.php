<div id="galeria">
	<h2 class="text-center">Galería de fotos</h3>
    <div class="card-deck col-sm-12">
      <div class="card bg-warning">
      <a href="{{URL::to('galeria/1')}}">
      <img class="card-img-top" src="{{ URL::to('img/galeria/vigilia.jpeg') }}" alt="Vigilia Pascual">
      </a>
        <div class="card-body text-center">
          <p class="card-text">Vigilia Pascual 2018</p>
        </div>
      </div>
      <div class="card bg-warning">
      <a href="{{URL::to('galeria/2')}}">
      <img class="card-img-top" src="{{ URL::to('img/galeria/sanblas.jpg') }}" alt="San Blas">
      </a>
        <div class="card-body text-center">
          <p class="card-text">Fiesta de san Blas</p>
        </div>
      </div>
      <div class="card bg-warning">
      <a href="{{URL::to('galeria/3')}}">
      <img class="card-img-top" src="{{ URL::to('img/galeria/sanandres.jpg') }}" alt="San Andrés">
      </a>
        <div class="card-body text-center">
          <p class="card-text">Fiesta de san Andrés</p>
        </div>
      </div>
      <div class="card bg-warning">
      <a href="{{URL::to('galeria/4')}}">
      <img class="card-img-top" src="{{ URL::to('img/galeria/encuentro.jpg') }}" alt="Procesión del santo Encuentro">
      </a>
        <div class="card-body text-center">
          <p class="card-text">Procesión del santo Encuentro</p>
        </div>
      </div>
    </div>
</div>

<footer id="pie" class="navbar bg-info rounded">
    <div class="d-flex justify-content-start">
        <p class="small text-white">2018 &copy; Parroquia de Barciela-Sigüeiro<br>
        Avda da Constitución, 53. Sigüeiro</p>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/"><img id="logo" src="{{ URL::to('img/iglesia.png') }}"></a>
    </div>
    <div class="d-flex justify-content-end">
        <p>
            <a href="#"><img class="ico_sociales" src="{{ URL::to('img/twitter.png') }}"></a>
            <a href="#"><img class="ico_sociales" src="{{ URL::to('img/facebook.png') }}"></a>
            <a href="#"><img class="ico_sociales" src="{{ URL::to('img/youtube.png') }}"></a>
            <a href="#"><img class="ico_sociales" src="{{ URL::to('img/google+.png') }}"></a>
        </p>
    </div>
</footer>