<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operator;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $data['dataOperator'] = Operator::all();
    return view('admin.operator.index', $data);
}

public function create()
{
    return view('admin.operator.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama_operator'     => 'required|max:100',
        'email'             => 'required|email|unique:operator,email',
        'no_telepon'        => 'required|numeric',
        'spesialisasi'      => 'required|in:Sound System,Videotron,Lighting,Semua',
        'tanggal_bergabung' => 'required|date',
        'status'            => 'required|in:aktif,nonaktif',
    ], $this->pesan());

    $data['nama_operator']     = $request->nama_operator;
    $data['email']             = $request->email;
    $data['no_telepon']        = $request->no_telepon;
    $data['spesialisasi']      = $request->spesialisasi;
    $data['tanggal_bergabung'] = $request->tanggal_bergabung;
    $data['status']            = $request->status;

    Operator::create($data);

    return redirect()->route('admin.operator.index')
        ->with('success', 'Penambahan Data Berhasil!');
}

public function edit(string $id)
{
    $data['dataOperator'] = Operator::findOrFail($id);
    return view('admin.operator.edit', $data);
}

public function update(Request $request, string $id)
{
    $request->validate([
        'nama_operator'     => 'required|max:100',
        'email'             => 'required|email|unique:operator,email,' . $id . ',operator_id',
        'no_telepon'        => 'required|numeric',
        'spesialisasi'      => 'required|in:Sound System,Videotron,Lighting,Semua',
        'tanggal_bergabung' => 'required|date',
        'status'            => 'required|in:aktif,nonaktif',
    ], $this->pesan());

    $operator = Operator::findOrFail($id);
    $operator->nama_operator     = $request->nama_operator;
    $operator->email             = $request->email;
    $operator->no_telepon        = $request->no_telepon;
    $operator->spesialisasi      = $request->spesialisasi;
    $operator->tanggal_bergabung = $request->tanggal_bergabung;
    $operator->status            = $request->status;
    $operator->save();

    return redirect()->route('admin.operator.index')
        ->with('success', 'Perubahan Data Berhasil!');
}

public function destroy(string $id)
{
    Operator::findOrFail($id)->delete();

    return redirect()->route('admin.operator.index')
        ->with('success', 'Hapus Data Berhasil!');
}

private function pesan(): array
{
    return [
        'nama_operator.required'     => 'Nama operator wajib diisi.',
        'nama_operator.max'          => 'Nama operator maksimal 100 karakter.',
        'email.required'             => 'Email wajib diisi.',
        'email.email'                => 'Format email tidak valid.',
        'email.unique'               => 'Email sudah dipakai operator lain.',
        'no_telepon.required'        => 'No. telepon wajib diisi.',
        'no_telepon.numeric'         => 'No. telepon harus berupa angka.',
        'spesialisasi.required'      => 'Spesialisasi wajib dipilih.',
        'spesialisasi.in'            => 'Spesialisasi tidak valid.',
        'tanggal_bergabung.required' => 'Tanggal bergabung wajib diisi.',
        'tanggal_bergabung.date'     => 'Tanggal bergabung harus berupa tanggal.',
        'status.required'            => 'Status wajib dipilih.',
        'status.in'                  => 'Status tidak valid.',
    ];
}
}
