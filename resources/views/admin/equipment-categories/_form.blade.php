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
    <div class="col-12 offset-lg-4 col-lg-4">
        <!-- Name -->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($category) ? $category->name : old('name') }}">

            @error('name')
            <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Position -->
        @isset($count)
            <div class="form-group">
                <label for="position">Posici&oacute;n:</label>

                <select id="cars" name="position" class="form-control @error('position') is-invalid @enderror">
                    @for($i = 1; $i <= $count; $i++)
                        @if($i < $count + 1)
                            <option value="{{ $i }}" {{ ($category->position == $i) ? 'selected' : null }}>
                                {{ $i }}
                            </option>
                        @endif
                    @endfor
                </select>

                @error('position')
                <span class="invalid-feedback font-weight-bold mt-3 ml-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        @endisset

        <!-- Active -->
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="hidden" name="active" value="0">
                <input type="checkbox"
                       class="custom-control-input"
                       id="active"
                       name="active"
                       value="1"
                       {{ isset($category) && $category->active == 1 ? 'checked' : null }}
                       {{ old('active') == 1 ? 'checked' : null }}
                >
                <label class="custom-control-label" for="active">Activa</label>
            </div>
        </div>

        <div class="form-group d-flex justify-content-between">
            <a class="btn btn-primary btn-lg" href="{{ route('admin.equipment_categories.index') }}">
                Volver
            </a>
            <button type="submit" class="btn btn-success btn-lg">Guardar</button>
        </div>
    </div>
</div>
