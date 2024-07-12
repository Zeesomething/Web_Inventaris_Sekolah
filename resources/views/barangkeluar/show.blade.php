@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-center">
                        <h1 class="card-title mb-1">Data Yang Anda Pilih</h1>
                    </div>
                    <center>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="col-12">
                                <h4 class="card-title mt-5">Nama Barang : {{ $keluar->pusat->nama }}</h4>
                                <h4 class="card-title mt-5">Merek : {{ $keluar->pusat->merek }}</h4>
                                <h4 class="card-title mt-5">Jumlah yang Berkurang : {{ $keluar->jumlah }}</h4>
                                <h4 class="card-title mt-5">Tanggal Keluar : {{ $keluar->tgl_keluar }}</h4>
                                <h4 class="card-title mt-5">Keterangan : {{ $keluar->ket }}</h4>
                            </div>
                        </div>
                        <a href="{{ route('barangkeluar.index') }}" class="btn btn-md btn-info" style="float: right">Kembali</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
@endsection