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
        <!-- Title -->
        <div class="form-group">
            <label for="title">T&iacute;tulo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ isset($image) ? $image->title : old('title') }}">

            @error('title')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <!-- Slug -->
        <div class="form-group">
            <label for="slug">Nombre de la imagen sin extensi&oacute;n</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                   value="{{ isset($image) ? $image->slug : old('slug') }}">

            @error('slug')
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
        @if(isset($image) && $image->image)
            <img src="{{ asset("imagenes/studio_gallery/{$image->image}-medium.jpg") }}" class="img-fluid" alt="{{ $image->image_alt }}">
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

        <!-- Image Alt -->
        <div class="form-group">
            <label for="image_alt">Texto Alternativo de la Imagen</label>
            <input type="text" class="form-control @error('image_alt') is-invalid @enderror" id="image_alt"
                   name="image_alt" value="{{ isset($image) ? $image->image_alt : old('image_alt') }}">

            @error('image_alt')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
        </div>
    </div>
</div>

<hr>

<!-- Description -->
<div class="form-group">
    <label for="description">Descripci&oacute;n</label>
    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ isset($image) ? $image->description : old('description') }}</textarea>

    @error('description')
    <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<hr>
<div class="row">
    <div class="col-sm-12 col-md-1">
        @isset($count)
        <!-- Position -->
        <div class="form-group">
                <label for="position">Posici&oacute;n:</label>

                <select id="cars" name="position" class="form-control">
                    @for($i = 1; $i <= $count; $i++)
                        @if($i < $count + 1)
                            <option value="{{ $i }}" {{ ($image->position == $i) ? 'selected' : null }}>
                                {{ $i }}
                            </option>
                        @endif
                    @endfor
                </select>
            </div>
        @endisset
    </div>
    <div class="col-sm-12 col-md-2 offset-md-9 d-flex justify-content-end align-items-center">
        <!-- Active -->
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="hidden" name="active" value="0">
                <input type="checkbox"
                       class="custom-control-input @error('active') is-invalid @enderror"
                       id="active"
                       name="active"
                       value="1"
                    {{ isset($image) && $image->active == 1 ? 'checked' : null }}
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
    <a class="btn btn-primary btn-lg" href="{{ route('admin.studio_gallery.index') }}">
        <span class="fas fa-chevron-left"></span>&nbsp;Volver
    </a>
    <button type="submit" class="btn btn-success btn-lg"><span class="fas fa-save"></span></button>
</div>
