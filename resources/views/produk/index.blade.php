@extends('layouts.admin')

@section('title', 'Produk')

@section('containt')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Produk</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('produk.from') }}" class="btn btn-danger">Tambah Produk</a>
            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($produk as $item)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="gambar error" width="100">
                            </td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('produk.hapus', $item->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
