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
                                <h4 class="card-title mt-5">Nama Barang : {{ $datapusat->nama }}</h4>
                                <h4 class="card-title mt-5">Merek : {{ $datapusat->merek }}</h4>
                                <h4 class="card-title mt-5">Jumlah Stok : {{ $datapusat->stok }}</h4>
                            </div>
                        </div>
                        <a href="{{ route('datapusat.index') }}" class="btn btn-md btn-info" style="float: right">Kembali</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
@endsection