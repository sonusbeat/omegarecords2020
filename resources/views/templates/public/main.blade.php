<!DOCTYPE html>
<html lang="es-MX">
  <head>
		<title>@yield('page-title') - Omega Records</title>
		<meta charset="utf-8">
		<meta name = "format-detection" content="telephone=no">
		<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
		<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
		<meta name="description" content="@yield('meta-description')">
		<meta name="language" content="Spanish">
		<meta name="robots" content="@yield('meta-robots')">
		<link rel="alternate" hreflang="mx" href="http://www.omegarecords.com.mx" />

		<link href='https://fonts.googleapis.com/css?family=Comfortaa:400,700' rel='stylesheet' type='text/css'>

		<!-- CSS Styles -->
        <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">

		@yield('additional-styles')

		<!--[if lt IE 8]>
		 <div style='clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
			  <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
			</a>
		</div>
		<![endif]-->

		<!--[if lt IE 9]>
        <link rel="stylesheet" href="{{ asset('css/ie.css') }}">
        <script src="{{ asset('js/html5shiv.js') }}"></script>
		<![endif]-->
	</head>
	<body>

		<h1 class="hidden-title">Omega Records Estudio de Grabación Musical</h1>

		<div id="back-top"></div><!-- button back top-->

		<div class="main">
		  <header>
				<div class="container_24">
					<div class="grid_24">

						<a href="/"
							data-toggle="tooltip"
							data-placement="right"
							title="Ir a Home de Omega Records"
						>
							<img src="{{ asset('images/logo-omega-records-horizontal.png') }}" alt="Omega Records Logo">
						</a>

					  @include('templates/public/_partials/main-menu')

					</div><!-- / .grid_24 -->
				</div><!-- / .container_24 -->
		  </header>

			@yield('content')

			@include('templates/public/_partials/footer')
		</div><!-- .main -->

		<!-- Application Scripts -->
        <script src="{{ asset('js/front-scripts.min.js') }}"></script>

		@yield('additional-scripts')

		@yield('custom-scripts')
	</body>
</html>
