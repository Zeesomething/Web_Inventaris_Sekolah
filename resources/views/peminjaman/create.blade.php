@extends('layouts.admin')
@section('content')
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Data</h4>
                    
                    <form action="{{route('peminjaman.store')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                      <div class="form-group">
                        <label for="" class="form-label">Nama Barang</label>
                        <select name="id_barang" class="form-control" id="" style="color: #ffffff;">
                            <option value=""></option>
                            @foreach ($pusat as $data)
                                <option value="{{$data->id }}">
                                    {{$data->nama}}
                                </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="" class="form-label">Merek</label>
                        <select name="id_barang" class="form-control" id="" style="color: #ffffff;">
                            <option value=""></option>
                            @foreach ($pusat as $data)
                                <option value="{{$data->id }}">
                                    {{$data->merek}}
                                </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Jumlah</label>
                        <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Merek" name="jumlah" style="color: #ffffff;">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="exampleInputPassword4" placeholder="Stok" name="tgl_pinjam" style="color: #ffffff;">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="exampleInputPassword4" placeholder="Stok" name="tgl_kembali" style="color: #ffffff;">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Nama Peminjam</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Stok" name="nama_peminjam" style="color: #ffffff;">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <a href="{{route('peminjaman.index')}}" class="btn btn-dark">Cancel</a>
                    </form>
                  </div>
                </div>
@endsection