@extends('templates/public/main')

@section('page-title', 'Equipo de Audio Profesional')

@section('meta-description')
    Omega Records cuenta Equipo de Audio Profesional con el cual te Garantizamos una Excelente Calidad de Sonido para tus Proyectos Musicales, ¡Visitenos Ahora!
@endsection

@section('meta-robots', 'index, follow')

@section('content')
<div class="div-content">
    <div class="container">
        <h2 class="v2">Equipo de Audio</h2>

        @foreach($categories->chunk(3) as $row)
        <div class="row">
            @foreach($row as $category)
            <div class="col-12 col-lg-4">
                <h3 class="v2">{{ $category->name }}</h3>

                <ul class="listWithMarker v2">
                    @foreach($category->equipment as $item)
                    <li><a href="#">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div><!-- /.col -->
            @endforeach
        </div><!-- /.row -->
        @endforeach

    </div><!-- /.container -->
</div><!-- /.div-content -->

<div class="banner_content container">
    <h2 class="text-center">NUESTRO ESTUDIO DE GRABACION CUENTA CON</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="wrapper hline2">
                <div class="media">
                    <div class="media-left media-middle">
                        <spam class="fa fa-users fa-4x"></spam>
                    </div><!-- / .media-left .media-middle -->
                    <div class="media-right media-middle">
                        <h3 class="color1">Ingenieros Calificados</h3>
                        <p class="color2">
                            Contamos con el personal más calificado para realizar tanto la grabación como la mezcla
                            y masterización de tu proyecto.
                        </p>
                    </div><!-- / .media-right .media-middle -->
                </div><!-- / .media -->
            </div><!-- / .wrapper .hline2 -->
            <div class="wrapper hline2">
                <div class="media">
                    <div class="media-left media-middle">
                        <spam class="fa fa-headphones fa-4x"></spam>
                    </div><!-- / .media-left .media-middle -->
                    <div class="media-right media-middle">
                        <h3 class="color1">Monitoreo Profesional</h3>
                        <p class="color2">
                            Realizamos el monitoreo con Audifonos Shure SRH-840 y Sony MDR-7506
                        </p>
                    </div><!-- / .media-left .media-middle -->
                </div><!-- / .media -->
            </div><!-- / .wrapper .hline2 -->
        </div><!-- / .col-md-4 -->

        <div class="col-md-4">
            <div class="wrapper hline2">
                <div class="media">
                    <div class="media-left media-middle">
                        <spam class="fa fa-signal fa-4x"></spam>
                    </div><!-- / .media-left .media-middle -->
                    <div class="media-right">
                        <h3 class="color1">Tratamiento Acústico</h3>
                        <p class="color2">
                            La cabina de grabación cuenta con paneles de absorbción, difusores acústicos y piso
                            laminado.
                        </p>
                    </div><!-- / .media-right .media-middle -->
                </div><!-- / .banner1 -->
            </div><!-- / .wrapper .hline2 -->
            <div class="wrapper hline2">
                <div class="media">
                    <div class="media-left media-middle">
                        <spam class="fa fa-music fa-4x"></spam>
                    </div><!-- / .media-right .media-middle -->
                    <div class="media-right media-middle">
                        <h3 class="color1">Producción Musical</h3>
                        <p class="color2">Contamos con músicos profesionales que te ayudaran a mejorar la producción
                            musical de tu proyecto</p>
                    </div><!-- / .media-right .media-middle -->
                </div><!-- / .media -->
            </div><!-- / .wrapper .hline2 -->
        </div><!-- / .col-md-4 -->

        <div class="col-md-4">
            <div class="wrapper hline2">
                <div class="media">
                    <div class="media-left media-middle">
                        <spam class="fa fa-volume-up fa-4x"></spam>
                    </div><!-- / .media-left .media-middle -->
                    <div class="media-right media-middle">
                        <h3 class="color1">Mezcla y Masterización</h3>
                        <p class="color2">Realizamos la Mezcla y Masterización de tu proyecto con los mejores
                            estandares más adecuados para la reproducción en cualquier dispositivo de audio</p>
                    </div><!-- / .media-right media-middle -->
                </div><!-- / .media -->
            </div><!-- / .wrapper .hline2 -->
            <div class="wrapper hline2">
                <div class="media">
                    <div class="media-left media-middle">
                        <spam class="fab fa-apple fa-4x"></spam>
                    </div><!-- / .media-right .media-middle -->
                    <div class="media-right media-middle">
                        <h3 class="color1">Equipo de Computo</h3>
                        <p class="color2">Contamos con equipo de computo de la marca Apple tanto para grabación de
                            estudio como para grabación en vivo.</p>
                    </div>
                </div>
            </div><!-- / .wrapper .hline2 -->
        </div><!-- / .col-md-4 -->
    </div><!-- / .row -->
</div><!-- / .banner_content -->
@endsection

@section('custom-scripts')
    <script>
        $(function () {
            $("nav a:contains('EQUIPO')").parent().addClass('current');
        });
    </script>
@endsection
