@extends('layouts.app')

@section('title', 'Dashboard | Tambah Produk')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Tambah Produk</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item"><a href="{{route('index')}}"></a>Produk</li>
                        <li class="breadcrumb-item active"> Tambah Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-md-12">
                    <form class="card" id="myForm" method="POST" action="{{ route('post-product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-control btn-square" id="kategori" name="kategori">
                                            <option value="">--Pilih Kategori--</option>
                                            <option value="Alat Olahraga">Alat Olahraga</option>
                                            <option value="Alat Musik">Alat Musik</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Barang</label>
                                        <input class="form-control" type="text" id="namabarang" name="namabarang" placeholder="Masukkan nama barang">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Harga Beli</label>
                                        <input class="form-control" type="number" id="hargabeli" name="hargabeli" placeholder="Masukkan harga beli">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Harga Jual</label>
                                        <input class="form-control" type="number" id="hargajual" name="hargajual" placeholder="Masukkan harga jual">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Stok Barang</label>
                                        <input class="form-control" type="number" id="stokbarang" name="stokbarang" placeholder="Masukkan stok barang">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <label class="form-label mb-3">Upload Image</label>
                                        <div class="upload-container">
                                            <div class="border-container">
                                                <div class="text-center">
                                                    <img src="{{ asset('assets/images/upload.png') }}" style="width: 256px; height: auto;" id="preview-image" alt="search" />
                                                    <p>Klik <a href="#" id="file-browser">disini</a> untuk upload gambar.</p>
                                                    <input type="file" id="file-input" name="image" accept="image/*" onchange="handleFileSelect(this)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-outline-light" type="button" onclick="resetForm()">Batalkan</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection