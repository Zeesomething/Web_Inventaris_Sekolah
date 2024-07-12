<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DataPusat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

Carbon::setLocale('id');

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $masuk = BarangMasuk::all();

        foreach ($masuk as $data) {
            $data->formatted_tanggal = Carbon::parse($data->tgl_masuk)->translatedFormat('l, d F Y');
        }

        confirmDelete('delete', 'Apakah Anda Yakin?');
        return view('barangmasuk.index', compact('masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pusat = DataPusat::all();
        return view('barangmasuk.create', compact('pusat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masuk = new BarangMasuk();
        $masuk->jumlah = $request->jumlah;
        $masuk->tgl_masuk = $request->tgl_masuk;
        $masuk->ket = $request->ket;
        $masuk->id_barang = $request->id_barang;

        $pusat = DataPusat::findOrFail($request->id_barang);
        $pusat->stok += $request->jumlah;
        $pusat->save();

        $masuk->save();
        Alert::success('Success', 'Data Berhasil Ditambahkan')->autoClose(1500);
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $masuk = BarangMasuk::findOrFail($id);
        return view('barangmasuk.show', compact('masuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masuk = BarangMasuk::findOrFail($id);
        $pusat = DataPusat::all();
        return view('barangmasuk.edit', compact('masuk', 'pusat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $masuk = BarangMasuk::findOrFail($id);
        $pusat = DataPusat::findOrFail($masuk->id_barang);
        $pusat->stok -= $masuk->jumlah;
        $pusat->stok += $request->jumlah;
        $pusat->save();
        $masuk->jumlah = $request->jumlah;
        $masuk->tgl_masuk = $request->tgl_masuk;
        $masuk->ket = $request->ket;
        $masuk->id_barang = $request->id_barang;

        $masuk->save();
        Alert::success('Success', 'Data Berhasil diedit')->autoClose(1500);
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masuk = BarangMasuk::findOrFail($id);
        $pusat = DataPusat::findOrFail($masuk->id_barang);
        $pusat->stok -= $masuk->jumlah;
        $pusat->save();
        $masuk->delete();
        Alert::success('Success', 'Data Berhasil Dihapus')->autoClose(1500);
        return redirect()->route('barangmasuk.index');
    }
}
