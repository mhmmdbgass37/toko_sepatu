@extends('layouts.admin')

@section('title', 'Produk')

@section('containt')
<form action="{{ route('produk.update', $produk->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">{{ isset($produk) ? 'Form Edit Barang' : 'Tambah Produk' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        @if ($errors->has('gambar'))
                            <div class="text-danger">{{ $errors->first('gambar') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', isset($produk) ? $produk->nama_produk : '') }}">
                        @if ($errors->has('nama_produk'))
                            <div class="text-danger">{{ $errors->first('nama_produk') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', isset($produk) ? $produk->deskripsi : '') }}">
                        @if ($errors->has('deskripsi'))
                            <div class="text-danger">{{ $errors->first('deskripsi') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', isset($produk) ? $produk->harga : '') }}">
                        @if ($errors->has('harga'))
                            <div class="text-danger">{{ $errors->first('harga') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', isset($produk) ? $produk->stok : '') }}">
                        @if ($errors->has('stok'))
                            <div class="text-danger">{{ $errors->first('stok') }}</div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
