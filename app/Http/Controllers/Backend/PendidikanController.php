<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pendidikan::latest()->get();

        return view('backend.pendidikan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            // 'taingkatan' => 'required',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'required|integer',
        ]);

        // dd($request->all());

        Pendidikan::create($request->all());

        Alert::success('Berhasil', 'Data berhasil ditambhakan');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Pendidikan::findOrFail(decrypt($id));
        $data->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Pendidikan::findOrFail(decrypt($id));

        return view('backend.pendidikan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'required|integer',
        ]);

        $data = Pendidikan::findOrFail($id);

        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diupdate');
        return redirect()->route('pendidikan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
