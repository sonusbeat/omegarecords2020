@extends('templates/public/main')

@section('page-title', 'Información de Contacto')

@section('meta-description')
Pongase en contacto con nostros para poder atender todas sus preguntas a travez de nuestro formulario de contacto ó consulte números telefónicos y dirección
@endsection

@section('meta-robots', 'noindex, nofollow')

@section('content')
<div class="div-content container">
  <div class="raw">
    <div class="col-sm-4 col-md-6">
      <h2 class="v2">Formulario de Contacto</h2><br>

      @if(session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="text-center"><b>{!! session('message') !!}</b></div>
        </div><!-- /.alert -->
      @endif

      <form class="form-horizontal" method="post" action="{{ route('front.email-process') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <label class="col-md-2 control-label" for="name">Nombre</label>
          <div class="col-md-10">
            <input
              type="text"
              name="name"
              class="form-control"
              id="name"
              value="{{ old('name') }}"
            >
          @error('name')
          <br><div class="text-danger"><b>{{ $message }}</b></div>
          @enderror
          </div>
        </div><!-- /nombre -->

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
          <label class="col-md-2 control-label" for="email">Email</label>
          <div class="col-md-10">
            <input
              type="email"
              name="email"
              class="form-control"
              id="email"
              value="{{ old('email') }}"
            >
          @error('email')
          <br><div class="text-danger"><b>{{ $message }}</b></div>
          @enderror
          </div>
        </div><!-- /email -->

        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
          <label class="col-md-2 control-label" for="mobile">Celular</label>
          <div class="col-md-10">
            <input
              type="text"
              name="mobile"
              class="form-control"
              id="mobile"
              value="{{ old('mobile') }}"
            >
          @error('mobile')
          <br><div class="text-danger"><b>{{ $message }}</b></div>
          @enderror
          </div>
        </div><!-- /mobile -->

        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
          <label class="col-md-2 control-label" for="message">Mensaje</label>
          <div class="col-md-10">
            <textarea name="message" class="form-control" rows="3" id="message">{{ old('message') }}</textarea>
          @error('message')
          <br><div class="text-danger"><b>{{ $message }}</b></div>
          @enderror
          </div>
        </div><!-- /message -->

        <div class="form-group text-right">
          <div class="col-xs-12">
            <button class="btn btn-default" type="submit">Enviar</button>
          </div>
        </div>
      </form>
    </div><!-- /.col -->

    <div class="col-sm-8 col-md-6">
      <h2 class="v2">Mapa de Ubicación</h2>
      <figure class="img_inner">
        <a href="https://goo.gl/maps/B6bnC9PBwE32" target="_blank">
          <img src="{{ asset('imagenes/mapa-ubicacion-omega-records.jpg') }}" alt="Mapa de ubicación de Omega Records" class="img-responsive">
        </a>
      </figure>

      <p class="text-center">* De clic en la imagen para ampliar</p>
    </div><!-- /.col -->
  </div><!-- /.raw -->

  <div class="clearfix"></div><br><br>
</div><!-- /.div-content .container -->
@endsection
