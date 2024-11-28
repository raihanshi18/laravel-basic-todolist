@include('templates.header', ['title' => 'List Siswa'])

<?php

?>

<div class="container mt-4">
    <div class="panel p-4">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo mt-3 ">
                    <h3>EARTH TO DO LIST</h3>
                </div>
                <a href="{{ route('list-siswa.index') }}"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>
            <div class="bottom">
                <h6 class="panel-title">Update Student</h6>
                <form method="POST" action="{{ route('list-siswa.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')   
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-25">
                                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                <input type="text"
                                    class="form-control"
                                    placeholder="Name"
                                    name="name"
                                    value="{{ $data->name }}">
                            </div>
                            @error('name')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-25">
                                <span class="input-group-text"><i class="fa-regular fa-home"></i></span>
                                <select name="classes" class="form+-control" value="{{ $data->classes }}">
                                    <option value="">CHOOSE CLASS</option>
                                    <option value="X" @if($data->classes == 'X') selected @endif>X</option>
                                    <option value="XI" @if($data->classes == 'XI') selected @endif>XI</option>
                                    <option value="XII" @if($data->classes == 'XII') selected @endif>XII</option>
                                </select>
                            </div>
                            @error('classes')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-25">
                                <span class="input-group-text"><i class="fa-regular fa-building"></i></span>
                                <select name="major" class="form-control" value="{{ $data->major}}">
                                    <option value="">CHOOSE MAJOR</option>
                                    <option value="PPLG" @if($data->major == 'PPLG') selected @endif>PPLG</option>
                                    <option value="TJKT" @if($data->major == 'TJKT') selected @endif>TJKT</option>
                                    <option value="TKRO" @if($data->major == 'TKRO') selected @endif>TKRO</option>
                                    <option value="MPLB" @if($data->major == 'MPLB') selected @endif>MPLB</option>
                                </select>
                            </div>
                            @error('major')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-25">
                                <span class="input-group-text"><i class="fa-regular fa-calendar"></i></span>
                                <input type="date"
                                    class="form-control"
                                    placeholder="Date"
                                    name="birth_date"
                                    value="{{$data->birth_date}}">
                            </div>
                            @error('birth_date')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-25">
                                <span class="input-group-text"><i class="fa-regular fa-image"></i></span>
                                <input type="file"
                                    class="form-control"
                                    name="photo_profile">
                            </div>
                            <img src="{{ $data->photo_profile }}" class="img-thumbnail" alt="" width="120px">
                            @error('photo_profile')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 login-btn mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>


    @include('templates.footer')