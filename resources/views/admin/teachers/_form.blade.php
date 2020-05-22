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
    <div class="col-xs-12 col-md-6">
        <!-- First Name -->
        <div class="form-group">
            <label for="first_name">Nombre</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ isset($teacher) ? $teacher->first_name : old('first_name') }}">

            @error('first_name')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- Email -->
        <div class="form-group">
            <label for="email">Correo Electr&oacute;nico</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($teacher) ? $teacher->email : old('email') }}">

            @error('email')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <!-- Last Name -->
        <div class="form-group">
            <label for="last_name">Apellido</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ isset($teacher) ? $teacher->last_name : old('last_name') }}">

            @error('last_name')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- Whats App -->
        <div class="form-group">
            <label for="whatsapp">WhatsApp</label>
            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ isset($teacher) ? $teacher->whatsapp : old('whatsapp') }}">

            @error('whatsapp')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-xs-12 col-md-6">
        @if(isset($teacher) && $teacher->image)
            <img src="{{ asset("imagenes/instructores/{$teacher->image}-medium.jpg") }}" class="img-fluid" alt="{{ $teacher->image_alt }}">
        @else
            <img src="{{ asset('images/no_image.jpg') }}" class="img-fluid" alt="No Image">
        @endif
    </div>
    <div class="col-xs-12 col-md-6 d-flex flex-column justify-content-center">
        <!-- Image -->
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">

            @error('image')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Image Name -->
        <div class="form-group">
            <label for="image_name">Nombre de imagen</label>
            <input type="text" class="form-control @error('image_name') is-invalid @enderror" id="image_name" name="image_name" value="{{ isset($teacher) ? $teacher->image_name : old('image_name') }}">

            @error('image_name')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Image Alt -->
        <div class="form-group">
            <label for="image_alt">Texto Alternativo de la Imagen</label>
            <input type="text" class="form-control @error('image_alt') is-invalid @enderror" id="image_alt"
                   name="image_alt" value="{{ isset($teacher) ? $teacher->image_alt : old('image_alt') }}">

            @error('image_alt')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<hr>

<h3>Social Media</h3>

<div class="row">
    <div class="col-12 col-lg-6">
        <!-- Facebook -->
        <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" class="form-control w-100 @error('facebook') is-invalid @enderror" id="facebook" name="facebook"
                   value="{{ isset($teacher) ? $teacher->facebook : old('facebook') }}">

            @error('facebook')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- Twitter -->
        <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="text" class="form-control w-100 @error('twitter') is-invalid @enderror" id="twitter" name="twitter"
                   value="{{ isset($teacher) ? $teacher->twitter : old('twitter') }}">

            @error('twitter')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <!-- Instagram -->
        <div class="form-group">
            <label for="instagram">Instagram</label>
            <input type="text" class="form-control w-100 @error('instagram') is-invalid @enderror" id="instagram" name="instagram"
                   value="{{ isset($teacher) ? $teacher->instagram : old('instagram') }}">

            @error('instagram')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- Youtube -->
        <div class="form-group">
            <label for="youtube">Youtube</label>
            <input type="text" class="form-control w-100 @error('youtube') is-invalid @enderror" id="youtube" name="youtube"
                   value="{{ isset($teacher) ? $teacher->youtube : old('youtube') }}">

            @error('youtube')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<hr>

<!-- Biography -->
<div class="form-group">
    <label for="biography">Biograf&iacute;a</label>
    <textarea name="biography" id="biography" class="form-control editor @error('biography') is-invalid @enderror" rows="5">{{ isset($teacher) ? $teacher->biography : old('biography') }}</textarea>

    @error('biography')
    <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<!-- .row -->
<div class="row">
    <!-- .col -->
    <div class="col-12 col-lg-5">
        <!-- Seo Title -->
        <div class="form-group">
            <label for="seo_title">T&iacute;tulo Seo</label>
            <input type="text" class="form-control w-100 @error('seo_title') is-invalid @enderror" id="seo_title"
                   name="seo_title"
                   value="{{ isset($teacher) ? $teacher->seo_title : old('seo_title') }}">

            <p id="title_count" class="d-none mt-2"><b></b></p>

            @error('seo_title')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Seo Robots -->
        <div class="form-group">
            <label for="seo_robots">Seo Robots</label>
            <select name="seo_robots" id="seo_robots" class="form-control @error('seo_robots') is-invalid @enderror">
                <option disabled selected>Seleccione una opci&oacute;n</option>
                @foreach($seo_options as $key => $value)
                    <option value="{{ $value }}"
                        {{ ($value == old('seo_robots')) ? 'selected' : null }}
                        {{ (isset($teacher) && ($teacher->seo_robots == $value)) ? 'selected' : null }}
                    >{{ $key }}</option>
                @endforeach
            </select>

            @error('seo_robots')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <!-- /.col -->

    <!-- .col -->
    <div class="col-12 col-lg-7">
        <!-- Seo Description -->
        <div class="form-group">
            <label for="seo_description">Descripci&oacute;n Seo</label>
            <textarea class="form-control w-100
                @error('seo_description') is-invalid @enderror"
                      id="seo_description"
                      name="seo_description"
                      rows="5"
            >{{ isset($teacher) ? $teacher->seo_description : old('seo_description') }}</textarea>

            <p id="seo_description_count" class="d-none mt-2"><b></b></p>

            @error('seo_description')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-12 offset-lg-10 col-lg-2">
        <!-- Active -->
        <div class="form-group d-flex justify-content-end">
            <div class="custom-control custom-checkbox">
                <input type="hidden" name="active" value="0">
                <input type="checkbox"
                       class="custom-control-input @error('active') is-invalid @enderror"
                       id="active"
                       name="active"
                       value="1"
                    {{ isset($teacher) && $teacher->active == 1 ? 'checked' : null }}
                    {{ old('active') == 1 ? 'checked' : null }}
                >
                <label class="custom-control-label" for="active">Activo</label>

                @error('active')
                <span class="invalid-feedback font-weight-bold mt-3" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="form-group d-flex justify-content-between">
    <a class="btn btn-primary btn-lg" href="{{ route('admin.teachers.index') }}">
        <span class="fas fa-chevron-left"></span>&nbsp;Volver
    </a>
    <button type="submit" class="btn btn-success btn-lg"><span class="fas fa-save"></span></button>
</div>
