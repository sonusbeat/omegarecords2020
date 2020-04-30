@extends('templates.admin.main')

@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <div class="card card-hover">
            <a href="{{ route('admin.dashboard') }}">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                    <h6 class="text-white">Dashboard</h6>
                </div>
            </a>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <a href="#">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
                    <h6 class="text-white">Users</h6>
                </div>
            </div>
        </a>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <a href="#">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="fas fa-images"></i></h1>
                    <h6 class="text-white">Images</h6>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ultimas Imagenes</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="p-2"><img src="{{ asset('admin/assets/images/big/img1.jpg') }}" alt="user" width="50" class="rounded-circle"></div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">Cangrejo</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-right">April 14, 2016</span>
                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="p-2"><img src="{{ asset('admin/assets/images/big/img2.jpg') }}" alt="user" width="50" class="rounded-circle"></div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">Rosa</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-right">April 14, 2016</span>
                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="p-2"><img src="{{ asset('admin/assets/images/big/img3.jpg') }}" alt="user" width="50" class="rounded-circle"></div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">Pajaro</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-right">April 14, 2016</span>
                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">Tareas</h4>
                </div>
                <ul class="list-style-none">
                    <li class="d-flex no-block card-body">
                        <i class="fa fa-images w-30px m-t-5"></i>
                        <div>
                            <a href="#" class="m-b-0 font-medium p-0">Crear Modulo para im&aacute;genes</a>
                            <span class="text-muted">Tanto para backend como front end</span>
                        </div>
                        <div class="ml-auto">
                            <div class="tetx-right">
                                <h5 class="text-muted m-b-0">29</h5>
                                <span class="text-muted font-16">Apr</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex no-block card-body">
                        <i class="fa fa-user w-30px m-t-5"></i>
                        <div>
                            <a href="#" class="m-b-0 font-medium p-0">Crear CRUD Usuarios</a>
                            <span class="text-muted">Modulo para administradores del sitio</span>
                        </div>
                        <div class="ml-auto">
                            <div class="tetx-right">
                                <h5 class="text-muted m-b-0">29</h5>
                                <span class="text-muted font-16">Apr</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
