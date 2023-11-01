<?php

namespace App\Http\Controllers\Api\PengalamanKerja;

use App\Http\Controllers\Controller;
use App\Models\PengalamanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengalamanKerjaController extends Controller
{
    // GET DATA
    public function show()
    {
        $data = PengalamanKerja::latest()->get();

        return response()->json($data);
    }

    // GET DATA ID
    public function getid($id)
    {
        $id = PengalamanKerja::find($id);

        if (!$id) {
            return response()->json([
                'status' => false,
                'message' => 'Not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $id,
            'message' => 'Data Pengalaman Kerja',
        ], 200);
    }

    // CREATE DATA
    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'jabatan' => 'required',
                'tahun_masuk' => 'required',
                'tahun_keluar' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 401);
            }

            $pengalaman = PengalamanKerja::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'tahun_masuk' => $request->tahun_masuk,
                'tahun_keluar' => $request->tahun_keluar,
            ]);

            return response()->json($pengalaman);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // UPDATE PENGALAMAN
    public function update(Request $request, $id)
    {
        $data = PengalamanKerja::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        $request->validate([
            'nama' => 'string',
            'jabatan' => 'string',
            'tahun_masuk' => 'string',
            'tahun_keluar' => 'string',
        ]);

        $data->update($request->all());

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'Pengalaman kerja data updated successfully',
        ], 200);
    }


    // DELETE DATA
    public function delete(Request $request, $id)
    {
        $data = PengalamanKerja::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        $data->delete($request->all());

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'Pengalaman kerja data updated successfully',
        ], 200);
    }
}
