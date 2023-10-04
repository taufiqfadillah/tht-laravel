@extends('layouts.app')

@section('title', 'Dashboard | User')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Profil</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home')}}"></use>

                                </svg></a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Profil Saya</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="user-image mb-3">
                                        <div class="avatar">
                                            <div class="image-wrapper">
                                                <img class="img-100 rounded-circle" alt="" id="preview-image" src="{{ asset('storage/assets/user-images/' . Auth::user()->image) }}">
                                                <div class="pencil-icon">
                                                    <label for="image">
                                                        <i class="icofont icofont-pencil-alt-5"></i>
                                                    </label>
                                                    <input type="file" id="image" name="image" style="display:none;" onchange="previewImage()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                            <img src="{{ asset('assets/images/verified.png') }}" alt="Verified Image" class="ml-3" width="20" height="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Nama Kandidat</label>
                                        <input class="form-control" id="name" name="name" type="text" placeholder="Masukkan Nama" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Posisi Kandidat</label>
                                        <input class="form-control" id="position" name="position" type="text" placeholder="Masukkan Posisi" value="{{ Auth::user()->position }}">
                                    </div>
                                </div>
                                <div class="form-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection