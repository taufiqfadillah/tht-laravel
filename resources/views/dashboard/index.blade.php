@extends('layouts.app')

@section('title', 'Dashboard | Table')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Table</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home')}}"></use>

                                </svg></a></li>
                        <li class="breadcrumb-item active">Table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Produk</h5>
                    </div>
                    <div class="card-body">
                        <div class="page">
                            <main class="page__main-container">
                                <section class="section-product">
                                    <div class="section-product__content">
                                        <div class="filters">
                                            <ul class="filters__section">
                                                <li>
                                                    <label class="filters__form">
                                                        <input id="search" placeholder="Search for..." class="filters__name filters__input" />
                                                        <span class="filters__icon">
                                                            <img src="{{ asset('assets/images/table/search.png') }}" alt="search" />
                                                        </span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <div class="filters__form">
                                                        <select class="filters__name filters__input" id="sort" name="Sort by">
                                                            <option value="all" {{ $sort == 'all' ? 'selected' : '' }}>Semua</option>
                                                            <option value="image" {{ $sort == 'image' ? 'selected' : '' }}>Image</option>
                                                            <option value="namabarang" {{ $sort == 'namabarang' ? 'selected' : '' }}>Nama Produk</option>
                                                            <option value="kategori" {{ $sort == 'kategori' ? 'selected' : '' }}>Kategori Produk</option>
                                                            <option value="hargabeli" {{ $sort == 'hargabeli' ? 'selected' : '' }}>Harga Beli (Rp)</option>
                                                            <option value="hargajual" {{ $sort == 'hargajual' ? 'selected' : '' }}>Harga Jual (Rp)</option>
                                                            <option value="stokbarang" {{ $sort == 'stokbarang' ? 'selected' : '' }}>Stok Produk</option>
                                                        </select>

                                                        <span class="filters__icon">
                                                            <a href="#"><img src="{{ asset('assets/images/table/sort.png') }}" alt="sort" /></a>
                                                        </span>
                                                    </div>
                                                <li class="filters__form-push filters__right">
                                                    <a href="{{ route('export-product')}}" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                                                    <a href="{{ route('add-product')}}" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Produk</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <table class="page__table table">
                                            <thead>
                                                <th class="table__head">No</th>
                                                <th class="table__head table__head_right" colspan="3">Image</th>
                                                <th class="table__head" colspan="2">Nama Produk</th>
                                                <th class="table__head">Kategori Produk</th>
                                                <th class="table__head">Harga Beli (Rp)</th>
                                                <th class="table__head">Harga Jual (Rp)</th>
                                                <th class="table__head" colspan="2">Stok Produk</th>
                                                <th class="table__head" colspan="2">Aksi</th>
                                            </thead>
                                            <tbody>
                                                @foreach($produk as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td colspan="3"><img src="{{ asset('storage/assets/produk-images/' . $item->image) }}" style="width: 32px; height: 32px;" alt="Product Image"></td>
                                                    <td colspan="2">{{ $item->namabarang }}</td>
                                                    <td>{{ $item->kategori }}</td>
                                                    <td>{{ number_format($item->hargabeli, 0, ',', '.') }}</td>
                                                    <td>{{ number_format($item->hargajual, 0, ',', '.') }}</td>
                                                    <td colspan="2">{{ $item->stokbarang }}</td>
                                                    <td colspan="2">
                                                        <i class="text-success" data-feather="edit"></i>
                                                        <i class="text-danger" data-feather="trash"></i>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="card-body">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination pagination-dark pagin-border-dark gap-2 justify-content-end">
                                                    <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                                                    <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)">1</a></li>
                                                    <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)">2</a></li>
                                                    <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)">...</a></li>
                                                    <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)">20</a></li>
                                                    <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </section>
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection