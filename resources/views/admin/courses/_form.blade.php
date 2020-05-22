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
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ isset($course) ? $course->title : old('title') }}">

            @error('title')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- Teacher -->
        <div class="form-group">
            <label for="teacher_id">Instructor</label>

            <select name="teacher_id" id="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror">
                <option disabled selected>Seleccione un instructor</option>
                @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}"
                    {{ (old('teacher_id') == $teacher->id) ? 'selected' : null }}
                    {{ (isset($course) && $course->teacher_id == $teacher->id) ? 'selected' : null }}
                >
                    {{ $teacher->full_name() }}
                </option>
                @endforeach
            </select>

            @error('teacher_id')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <!-- Description -->
        <div class="form-group">
            <label for="description">Descripci&oacute;n</label>
            <textarea name="description" id="description" rows="5"
                class="form-control @error('description') is-invalid @enderror"
            >{{ isset($course) ? $course->description : old('description') }}</textarea>

            @error('description')
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
        @if(isset($course) && $course->image)
            <img src="{{ asset("imagenes/courses/{$course->image}-medium.jpg") }}" class="img-fluid" alt="{{ $course->image_alt }}">
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

        <!-- Permalink and Image Name -->
        <div class="form-group">
            <label for="permalink">URL y nombre de imagen</label>
            <input type="text" class="form-control @error('permalink') is-invalid @enderror" id="permalink"
                   name="permalink" value="{{ isset($course) ? $course->permalink : old('permalink') }}">

            @error('permalink')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Image Alt -->
        <div class="form-group">
            <label for="image_alt">Texto Alternativo de la Imagen</label>
            <input type="text" class="form-control @error('image_alt') is-invalid @enderror" id="image_alt"
                   name="image_alt" value="{{ isset($course) ? $course->image_alt : old('image_alt') }}">

            @error('image_alt')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-12 col-lg-6">
        <!-- Price -->
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="text" class="form-control w-100 @error('price') is-invalid @enderror" id="price" name="price"
                   value="{{ isset($course) ? $course->price : old('price') }}">

            @error('price')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- Start Date -->
        <div class="form-group">
            <label>Fecha de Inicio</label>
            <div class="input-group">
                <input type="text"
                       class="form-control @error('start_date') is-invalid @enderror"
                       id="datepicker-autoclose"
                       placeholder="año / mes / día"
                       name="start_date"
                       data-date-format="yyyy-mm-dd"
                       value="{{ isset($course) ? $course->start_date : old('start_date') }}"
                >
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>

                @error('start_date')
                <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <!-- Duration -->
        <div class="form-group">
            <div class="form-group">
                <label>Duraci&oacute;n</label>

                <input name="duration" id="duration" type="text"
                   class="form-control @error('duration') is-invalid @enderror"
                   value="{{ isset($course) ? $course->duration : old('duration') }}"
                >

                @error('duration')
                <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6">
         <!-- Video -->
        <div class="form-group">
            <label for="video">Video</label>
            <textarea name="video" id="video" class="form-control @error('video') is-invalid @enderror" rows="5">{{ isset($course) ? $course->video : old('video') }}</textarea>

            @error('video')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<hr>

<!-- Overview -->
<div class="form-group">
    <label for="overview">Visi&oacute;n General</label>
    <textarea name="overview" id="overview" class="form-control editor @error('overview') is-invalid @enderror"
              rows="5">{{ isset($course) ? $course->overview : old('overview') }}</textarea>

    @error('overview')
    <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
    <strong>{{ $message }}</strong>
</span>
    @enderror
</div>

<!-- Topics -->
<div class="form-group">
    <label for="topics">Temas</label>
    <textarea name="topics" id="topics" class="form-control editor @error('topics') is-invalid @enderror" rows="5">{{ isset($course) ? $course->topics : old('topics') }}</textarea>

    @error('topics')
    <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<!-- Content -->
<div class="form-group">
    <label for="content">Contenido</label>
    <textarea name="content" id="content" class="form-control editor @error('content') is-invalid @enderror" rows="5">{{ isset($course) ? $course->content : old('content') }}</textarea>

    @error('content')
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
                   value="{{ isset($course) ? $course->seo_title : old('seo_title') }}">

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
                        {{ (isset($course) && ($course->seo_robots == $value)) ? 'selected' : null }}
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
            >{{ isset($course) ? $course->seo_description : old('seo_description') }}</textarea>

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
    <div class="col-sm-12 col-md-1">
        @isset($count)
        <!-- Position -->
        <div class="form-group">
                <label for="position">Posici&oacute;n:</label>

                <select id="cars" name="position" class="form-control">
                    @for($i = 1; $i <= $count; $i++)
                        @if($i < $count + 1)
                            <option value="{{ $i }}" {{ ($course->position == $i) ? 'selected' : null }}>
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
                    {{ isset($course) && $course->active == 1 ? 'checked' : null }}
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
    <a class="btn btn-primary btn-lg" href="{{ route('admin.courses.index') }}">
        <span class="fas fa-chevron-left"></span>&nbsp;Volver
    </a>
    <button type="submit" class="btn btn-success btn-lg"><span class="fas fa-save"></span></button>
</div>
