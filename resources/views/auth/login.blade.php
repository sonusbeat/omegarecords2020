@extends('templates.admin.login')

@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
    <div class="auth-box bg-dark border-top border-secondary">
        <div id="loginform">
            <div class="text-center p-t-20 p-b-20">
                <span class="db"><img class="img-fluid" src="{{ asset('images/logo-omega-records-horizontal.png') }}" alt="logo"/></span>
            </div>

            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>&iexcl;&nbsp;{{ session('message') }}&nbsp;!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Form -->
            <form class="form-horizontal m-t-20" id="loginform" action="{{ route('login') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row p-b-30">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="{{ old('email') }}" autofocus>

                            @error('email')
                            <span class="invalid-feedback mt-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="fas fa-hashtag"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Contrase&ntilde;a" aria-label="Password" aria-describedby="basic-addon1" autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback mt-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-check text-white">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                Mantener Sesi&oacute;n
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-secondary">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="p-t-20">
                                <button class="btn btn-success float-right" type="submit">Acceder</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
