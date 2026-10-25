<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekening; 

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $data['dataRekening'] = Rekening::all();
    return view('admin.rekening.index', $data);
}

public function create()
{
    return view('admin.rekening.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama_bank'      => 'required|max:50',
        'nomor_rekening' => 'required|numeric|unique:rekening,nomor_rekening',
        'atas_nama'      => 'required|max:100',
        'status'         => 'required|in:aktif,nonaktif',
    ], $this->pesan());

    $data['nama_bank']      = $request->nama_bank;
    $data['nomor_rekening'] = $request->nomor_rekening;
    $data['atas_nama']      = $request->atas_nama;
    $data['status']         = $request->status;

    Rekening::create($data);

    return redirect()->route('admin.rekening.index')
        ->with('success', 'Penambahan Data Berhasil!');
}

public function edit(string $id)
{
    $data['dataRekening'] = Rekening::findOrFail($id);
    return view('admin.rekening.edit', $data);
}

public function update(Request $request, string $id)
{
    $request->validate([
        'nama_bank'      => 'required|max:50',
        'nomor_rekening' => 'required|numeric|unique:rekening,nomor_rekening,' . $id . ',rekening_id',
        'atas_nama'      => 'required|max:100',
        'status'         => 'required|in:aktif,nonaktif',
    ], $this->pesan());

    $rekening = Rekening::findOrFail($id);
    $rekening->nama_bank      = $request->nama_bank;
    $rekening->nomor_rekening = $request->nomor_rekening;
    $rekening->atas_nama      = $request->atas_nama;
    $rekening->status         = $request->status;
    $rekening->save();

    return redirect()->route('admin.rekening.index')
        ->with('success', 'Perubahan Data Berhasil!');
}

public function destroy(string $id)
{
    Rekening::findOrFail($id)->delete();

    return redirect()->route('admin.rekening.index')
        ->with('success', 'Hapus Data Berhasil!');
}

private function pesan(): array
{
    return [
        'nama_bank.required'      => 'Nama bank wajib diisi.',
        'nama_bank.max'           => 'Nama bank maksimal 50 karakter.',
        'nomor_rekening.required' => 'Nomor rekening wajib diisi.',
        'nomor_rekening.numeric'  => 'Nomor rekening harus berupa angka.',
        'nomor_rekening.unique'   => 'Nomor rekening sudah terdaftar.',
        'atas_nama.required'      => 'Atas nama wajib diisi.',
        'atas_nama.max'           => 'Atas nama maksimal 100 karakter.',
        'status.required'         => 'Status wajib dipilih.',
        'status.in'               => 'Status tidak valid.',
    ];
}
}
