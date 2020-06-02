<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'Comfortaa-Bold';
            src: url({{ asset('fonts/Comfortaa-Bold.ttf') }});
        }

        @font-face {
            font-family: 'Comfortaa-Regular';
            src: url({{ asset('fonts/Comfortaa-Regular.ttf') }});
        }

        @font-face {
            font-family: 'Roboto-Bold';
            src: url({{ asset('fonts/Roboto-Bold.ttf') }});
        }

        @font-face {
            font-family: 'Roboto-Medium';
            src: url({{ asset('fonts/Roboto-Medium.ttf') }});
        }

        h1 {
            font-family: 'Roboto-Bold', sans-serif;
            font-weight: 900;
            font-size: 45px;
            color: #f18a00;
            text-align: center;
        }

        h2 {
            font-family: 'Roboto-Medium', sans-serif;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        h3, h4, h5, h6, ul, p {
            font-family: 'Comfortaa-Regular', sans-serif;
            color: #444;
        }

        .text-center { text-align: center; }

        .price {
            color: #28a745;
            font-weight: bold;
        }

        .date {
            color: #007bff;
            font-weight: bold;
        }

        .duration {
            color: #f18a00;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Omega Records</h1>

    <h2>{{ $course->title }}</h2>

    <h3>Descripción</h3>
    <p>{{ $course->description }}</p>

    <h3>Visión General</h3>
    {!! $course->overview !!}

    <h3>Que Aprenderás</h3>
    {!! $course->topics !!}

    <hr>

    <h3>Contenido</h3>
    {!! $course->content !!}

    <hr>

    @if($course->price)
        <h3>Precio</h3>
        <p class="price">${{ number_format($course->price) }}</p>
    @endif

    @if($course->start_date)
        <h3>Fecha de Inicio</h3>
        <p class="date">{{ $course->start_date->formatLocalized('%e de %B del ') . $course->start_date->format('Y') }}</p>
    @endif

    @if($course->duration)
        <h3>Duración</h3>
        <p class="duration">{{ $course->duration }}</p>
    @endif

    <hr>

    <p><b>Dirección:</b> Barcelona 2583, Guadalajara, Jalisco, México</p>

    <p><b>Telefono:</b> 331 498 2299</p>
</body>
</html>
