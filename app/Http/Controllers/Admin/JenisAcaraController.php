<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $cari = $request->cari;

    $data['dataJenis'] = DB::table('jenis_acara')
        ->leftJoin('portofolio', 'portofolio.jenis_acara_id', '=', 'jenis_acara.jenis_acara_id')
        ->select('jenis_acara.*', DB::raw('COUNT(portofolio.portofolio_id) as jumlah_acara'))
        ->when($cari, function ($query) use ($cari) {
            $query->where(function ($q) use ($cari) {
                $q->where('jenis_acara.nama_jenis', 'like', "%{$cari}%")
                  ->orWhere('jenis_acara.keterangan', 'like', "%{$cari}%");
            });
        })
        ->groupBy(
            'jenis_acara.jenis_acara_id', 'jenis_acara.nama_jenis',
            'jenis_acara.keterangan', 'jenis_acara.created_at', 'jenis_acara.updated_at'
        )
        ->orderBy('jenis_acara.nama_jenis')
        ->get();

    $data['cari'] = $cari;

    return view('admin.jenis_acara.index', $data);
}

public function create()
{
    return view('admin.jenis_acara.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama_jenis' => 'required|max:50|unique:jenis_acara,nama_jenis',
        'keterangan' => 'nullable|max:255',
    ], $this->pesan());

    DB::table('jenis_acara')->insert([
        'nama_jenis' => $request->nama_jenis,
        'keterangan' => $request->keterangan,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('admin.jenis-acara.index')
        ->with('success', 'Penambahan Data Berhasil!');
}

public function edit(string $id)
{
    $data['dataJenis'] = DB::table('jenis_acara')->where('jenis_acara_id', $id)->first();

    if (! $data['dataJenis']) {
        abort(404);
    }

    return view('admin.jenis_acara.edit', $data);
}

public function update(Request $request, string $id)
{
    $request->validate([
        'nama_jenis' => 'required|max:50|unique:jenis_acara,nama_jenis,' . $id . ',jenis_acara_id',
        'keterangan' => 'nullable|max:255',
    ], $this->pesan());

    DB::table('jenis_acara')
        ->where('jenis_acara_id', $id)
        ->update([
            'nama_jenis' => $request->nama_jenis,
            'keterangan' => $request->keterangan,
            'updated_at' => now(),
        ]);

    return redirect()->route('admin.jenis-acara.index')
        ->with('success', 'Perubahan Data Berhasil!');
}

public function destroy(string $id)
{
    $dipakai = DB::table('portofolio')->where('jenis_acara_id', $id)->exists();

    if ($dipakai) {
        return redirect()->route('admin.jenis-acara.index')
            ->with('error', 'Jenis acara tidak bisa dihapus karena masih dipakai portofolio.');
    }

    DB::table('jenis_acara')->where('jenis_acara_id', $id)->delete();

    return redirect()->route('admin.jenis-acara.index')
        ->with('success', 'Hapus Data Berhasil!');
}

private function pesan(): array
{
    return [
        'nama_jenis.required' => 'Nama jenis acara wajib diisi.',
        'nama_jenis.max'      => 'Nama jenis acara maksimal 50 karakter.',
        'nama_jenis.unique'   => 'Nama jenis acara sudah ada.',
        'keterangan.max'      => 'Keterangan maksimal 255 karakter.',
    ];
}

}
