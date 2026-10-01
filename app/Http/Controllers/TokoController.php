<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokoRequest;
use App\Http\Resources\ProdukTokoResource;
use App\Http\Resources\TokoResource;
use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    //menampilkan toko + fitur pencarian
    public function index(Request $request)
    {
        $toko = Toko::query()
        ->search($request->only(['search', 'status']))
        ->get();

        return TokoResource::collection($toko);
    }

    public function show($id)
    {
        $toko = Toko::findOrFail($id);

        return new TokoResource($toko);
    }

    public function store(TokoRequest $request)
    {
        $validated = $request->validated();

        $toko = Toko::create([
            'nama_toko' => $validated['nama_toko'],
            'alamat'=> $validated['alamat'],
            'status' => 'aktif',
        ]);

        return response()->json([
            'message' => 'Toko berhasil dibuat',
            'data' => new TokoResource($toko),
        ]);
    }

    public function destroy($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->delete();

        return response()->json([
            'message' => 'toko berhasil dihapus',
            'data' => new TokoResource($toko),
        ]);
    }

    public function update(TokoRequest $request, $id)
    {
        $validated = $request->validated();

        $toko = Toko::findOrFail($id);

        $toko-> update([
            'nama_toko' => $validated['nama_toko'],
            'alamat' => $validated['alamat'],
            'status' => $validated['status'],
        ]);

        return response()->json([
            'message' => 'Toko berhasil diperbarui',
            'data' => $toko,
        ]);
    }

    public function isiToko($id)
    {
        $toko = Toko::with('produkToko')->findOrFail($id);

        return response()->json([
            'nama_toko' =>$toko->nama_toko,
            'produk' => ProdukTokoResource::collection($toko->produkToko)
        ]);
    }
}
