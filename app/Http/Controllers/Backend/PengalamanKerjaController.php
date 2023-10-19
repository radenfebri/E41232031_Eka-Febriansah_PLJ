<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PengalamanKerja;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengalamanKerjaController extends Controller
{
    public function index()
    {
        $data = PengalamanKerja::latest()->get();

        return view('backend.pengalaman-kerja.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'jabatan' => 'required|string|max:50',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'required|integer',
        ]);

        // dd($request);

        // PengalamanKerja::create([
        //     'nama' => $request->nama,
        //     'jabatan' => $request->jabatan,
        //     'tahun_masuk' => $request->tahun_masuk,
        //     'tahun_keluar' => $request->tahun_keluar,
        // ]);

        PengalamanKerja::create($request->all());

        Alert::success('Berhasil', 'Data berhasil ditambhakan');
        return back();
    }


    // Function Show di gantikan dengan Remove
    public function show($id)
    {
        $data = PengalamanKerja::findOrFail(decrypt($id));
        $data->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return back();
    }


    public function edit($id)
    {
        $data = PengalamanKerja::findOrFail(decrypt($id));

        return view('backend.pengalaman-kerja.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'jabatan' => 'required|string|max:50',
            'tahun_masuk' => 'required|integer|min:1900|max:3000',
            'tahun_keluar' => 'required|integer|min:1900|max:3000',
        ]);

        $data = PengalamanKerja::findOrFail($id);
        // $data->update([
        //     'nama' => $request->nama,
        //     'jabatan' => $request->jabatan,
        //     'tahun_masuk' => $request->tahun_masuk,
        //     'tahun_keluar' => $request->tahun_keluar,
        // ]);

        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diupdate');
        return redirect()->route('pengalaman-kerja.index');
    }


    public function destroy($id)
    {
        // 
    }
}
