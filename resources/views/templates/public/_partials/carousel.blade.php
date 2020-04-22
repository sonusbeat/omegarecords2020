<div class="container hidden-xs hidden-sm">
  <div class="row">
    <div class="col-md-12">
      <div id="main-carousel" class="carousel slide main-carousel" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div id="#main.carousel" class="carousel-inner" role="listbox">

          <div class="item active">
            <img src="{{ asset('imagenes/instalaciones/estudio-de-grabacion-musical.jpg') }}" alt="Estudio de Grabación Musical">
          </div><!-- .item -->

          <div class="item">
            <img src="{{ asset('imagenes/servicios/mezcla-y-masterizacion-musical.jpg') }}" alt="Mezcla y Masterización de Audio Profesional">
          </div><!-- .item -->

          <div class="item">
            <img src="{{ asset('imagenes/servicios/distribucion-musical-digital.jpg') }}" alt="Distribución Musical Digital">
          </div><!-- .item -->

          <div class="item">
            <img src="{{ asset('imagenes/servicios/grabacion-musical.jpg') }}" alt="Grabación Musical">
          </div><!-- .item -->

        </div><!-- .carousel-inner -->
        <!-- ######## CONTROLS ######## -->
        <!-- Previous -->
        <a class="left carousel-control"
          href="#main-carousel"
          role="button"
          data-slide="prev"
        >
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <!-- Next -->
        <a class="right carousel-control"
          href="#main-carousel"
          role="button"
          data-slide="next"
        >
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
        <!-- ######## Indicators ######## -->
        <ol class="carousel-indicators">
          <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#main-carousel" data-slide-to="1"></li>
          <li data-target="#main-carousel" data-slide-to="2"></li>
          <li data-target="#main-carousel" data-slide-to="3"></li>
        </ol>
    </div><!-- .carousel -->
  </div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->
