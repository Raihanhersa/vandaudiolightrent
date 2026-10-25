<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
    $data['dataLayanan'] = Layanan::all();
    return view('admin.layanan.index', $data);
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());   // debug: buka komentar ini dulu untuk uji

        $data['nama_layanan']   = $request->nama_layanan;
        $data['kategori']       = $request->kategori;
        $data['deskripsi']      = $request->deskripsi;
        $data['harga_per_hari'] = $request->harga_per_hari;
        $data['stok']           = $request->stok;
        $data['status']         = $request->status;

        Layanan::create($data);

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
    {
    $data['dataLayanan'] = Layanan::findOrFail($id);
    return view('admin.layanan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $layanan = Layanan::findOrFail($id);

    $layanan->nama_layanan   = $request->nama_layanan;
    $layanan->kategori       = $request->kategori;
    $layanan->deskripsi      = $request->deskripsi;
    $layanan->harga_per_hari = $request->harga_per_hari;
    $layanan->stok           = $request->stok;
    $layanan->status         = $request->status;
    $layanan->save();

    return redirect()->route('admin.layanan.index')
        ->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
    $layanan = Layanan::findOrFail($id);
    $layanan->delete();

    return redirect()->route('admin.layanan.index')
        ->with('success', 'Hapus Data Berhasil!');
    }
}
