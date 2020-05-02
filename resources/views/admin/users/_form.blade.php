@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p class="font-weight-bold">Hay {{ $errors->count() > 1 ? $errors->count() . ' errores' : '1 error' }} en el formulario</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="row">
    <div class="col">
        <!-- First Name -->
        <div class="form-group">
            <label for="first_name">Nombre</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ isset($user) ? $user->first_name : old('first_name') }}">

            @error('first_name')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <label for="last_name">Apellido</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ isset($user) ? $user->last_name : old('last_name') }}">

            @error('last_name')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}">

            @error('email')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Image -->
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ isset($user) ? $user->image : old('image') }}">

            @error('image')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Image Alt -->
        <div class="form-group">
            <label for="image_alt">Texto Alternativo de la Imagen</label>
            <input type="text" class="form-control @error('image_alt') is-invalid @enderror" id="image_alt" name="image_alt" value="{{ isset($user) ? $user->image_alt : old('image_alt') }}">

            @error('image_alt')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col">
        <!-- Password -->
        <div class="form-group">
            <label for="password">Contrase&ntilde;a</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">

            @error('password')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Password Confirmation -->
        <div class="form-group">
            <label for="password_confirmation">Repite Contrase&ntilde;a</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">

            @error('password_confirmation')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <hr>
        <!-- Type -->
        <div class="form-group row">
            <label class="col-md-2">Tipo</label>
            <div class="col-md-10">
                <div class="custom-control custom-radio">
                    <input type="radio"
                           class="custom-control-input"
                           id="type" name="type"
                           value="guest"
                           {{ isset($user) && $user->type == 'guest' ? 'checked' : null }}
                    >
                    <label class="custom-control-label" for="type">Registrado</label>
                    <input type="hidden" name="type" value="guest">
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio"
                           class="custom-control-input"
                           id="type2"
                           name="type"
                           value="admin"
                           {{ isset($user) && $user->type == 'admin' ? 'checked' : null }}
                    >
                    <label class="custom-control-label" for="type2">Administrador</label>
                </div>
            </div>
        </div>
        <hr>
        <!-- Active -->
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="hidden" name="active" value="0">
                <input type="checkbox"
                       class="custom-control-input"
                       id="active"
                       name="active"
                       value="1"
                       {{ isset($user) && $user->active == 1 ? 'checked' : null }}
                       {{ old('active') == 1 ? 'checked' : null }}
                >
                <label class="custom-control-label" for="active">Activo</label>
            </div>
        </div>
        <hr>
    </div>
</div>

<div class="form-group d-flex justify-content-between">
    <a class="btn btn-primary" href="{{ route('admin.users.index') }}"><span class="fas fa-chevron-left"></span></a>
    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span></button>
</div>
