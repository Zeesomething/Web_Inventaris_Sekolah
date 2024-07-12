@extends('layouts.admin')
@section('content')
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Data</h4>
                    
                    <form action="{{route('barangmasuk.update',$masuk->id)}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @method('PUT')
                      <div class="form-group">
                        <label for="" class="form-label">Nama Barang</label>
                        <select name="id_barang" class="form-control" id="" value="{{$masuk->pusat->nama}}" style="color: #ffffff;">
                            @foreach ($pusat as $data)
                                <option value="{{$data->id }}"
                                @if($masuk->pusat->id == $data->id) selected @endif>
                                    {{$data->nama}}
                                </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="" class="form-label">Merek</label>
                        <select name="id_barang" class="form-control" id="" value="{{$masuk->pusat->merek}}" style="color: #ffffff;">
                            @foreach ($pusat as $data)
                                <option value="{{$data->id }}"
                                @if($masuk->pusat->merek == $data->merek) selected @endif>
                                    {{$data->merek}}
                                </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Jumlah</label>
                        <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Merek" name="jumlah" value="{{$masuk->jumlah}}" style="color: #ffffff;">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="exampleInputPassword4" placeholder="Stok" name="tgl_masuk" value="{{$masuk->tgl_masuk}}" style="color: #ffffff;">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Keterangan</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Stok" name="ket" value="{{$masuk->ket}}" style="color: #ffffff;">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Edit</button>
                      <a href="{{route('barangmasuk.index')}}" class="btn btn-dark">Cancel</a>
                    </form>
                  </div>
                </div>
@endsection