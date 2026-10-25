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
        return view('admin.layanan.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
